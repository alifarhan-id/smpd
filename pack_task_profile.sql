-- Package: pack_task_profile

-- DROP PACKAGE pack_task_profile;

CREATE OR REPLACE PACKAGE sikp.pack_task_profile
IS



-- *****************************************************************************************************************
-- JENDELA INBOX, Workflow Tools
-- Copyright : Suwanto Hadi 2009 postgreSQL version
-- Tested 15 Januari 2012
-- Last Modified/Tuning : 21 Juni 2012
-- *****************************************************************************************************************
  /*
 pin_control_ajn_1 CONSTANT numeric DEFAULT 500;   --- flow segment
 pin_control_ajn_2 CONSTANT numeric DEFAULT 501;   --- flow network

 pin_control_ajn_5 CONSTANT numeric DEFAULT 109;    --- flow trouble handling
 */

 pin_control_wp_1 CONSTANT numeric DEFAULT 500;   --- flow pendaftaran
 pin_control_wp_2 CONSTANT numeric DEFAULT 501;   --- flow pelaporan
 pin_control_wp_3 CONSTANT numeric DEFAULT 502;    --- flow pembetulan
 pin_control_wp_4 CONSTANT numeric DEFAULT 503;    --- flow pjk kurang bayar
 pin_control_wp_5 CONSTANT numeric DEFAULT 504;    --- flow pembetulan
 pin_control_wp_6 CONSTANT numeric DEFAULT 505;    --- flow registrasi BPHTB
 pin_control_wp_7 CONSTANT numeric DEFAULT 506;    --- flow SKPDKB JABATAN
 pin_control_wp_8 CONSTANT numeric DEFAULT 507;    --- flow Penutupan

 pada numeric;

 FUNCTION task_profile_list(puser character varying) RETURN SETOF ty_task_profile;
 FUNCTION workflow_summary_list(pdoc_type_id numeric, puser character varying) RETURN SETOF ty_workflow_summary;
 FUNCTION user_task_list(vp_w_doc_type_id numeric, vp_w_proc_id numeric, vprofile_type character varying, puser character varying, skeyword character varying DEFAULT NULL::character varying) RETURN SETOF ty_workflow_ctl;
 FUNCTION workflow_name(puser character varying) RETURN SETOF ty_task_profile;
 FUNCTION workflow_name_wp(puser character varying) RETURN SETOF ty_task_profile;
 PROCEDURE taken_task(vcurr_ctl_id numeric, vusername character varying DEFAULT NULL::character varying, vcurr_doc_type_id numeric DEFAULT NULL::numeric);
 PROCEDURE stopclock_entry(vcurr_ctl_id numeric, vp_w_doc_type_id numeric, vp_w_proc_id numeric, vdoc_id numeric, vp_stop_clock_type_id numeric, vreason1 character varying, vreason2 character varying, vuserlogin character varying);
 -------------
 FUNCTION p_clock_type_list(skeyword1 character varying DEFAULT NULL::character varying, skeyword2 character varying DEFAULT NULL::character varying, skeyword3 character varying DEFAULT NULL::character varying, skeyword4 character varying DEFAULT NULL::character varying, skeyword5 character varying DEFAULT NULL::character varying, param1 character varying DEFAULT NULL::character varying, param2 character varying DEFAULT NULL::character varying, param3 character varying DEFAULT NULL::character varying, param4 character varying DEFAULT NULL::character varying, param5 character varying DEFAULT NULL::character varying) RETURN SETOF ty_lovcx;
 FUNCTION broadcaster(vusername character varying) RETURN SETOF ty_broadcast_ctl;
END pack_task_profile;

CREATE OR REPLACE PACKAGE BODY pack_task_profile
IS




-- *****************************************************************************************************************
-- JENDELA INBOX, Workflow Tools
-- Copyright : Suwanto Hadi 2009 postgreSQL version
-- Tested 15 Januari 2012
-- Last Modified/Tuning : 21 Juni 2012
-- *****************************************************************************************************************

  ------------------------------------------------------------------------------------
  --  task profile
  ------------------------------------------------------------------------------------
  FUNCTION task_profile_list(puser character varying) RETURN SETOF ty_task_profile IS
  surl     varchar2(128);
  puser_id number;
  vlive    number;
  v_rec    sikp.ty_task_profile;
  begin

     ----CARA PANGGIL: select * from sikp.pack_task_profile.task_profile_list('MO7002') AS tbl (ty_task_profile)

     select value
     into vlive
     from sikp.p_global_param
     where code = 'LIVE_IN_INBOX';

     for v_rec in (
                   select
                   ------------------------------------------------------------
                   --- WORKFLOW PRODUKSI
                   ------------------------------------------------------------
                                /*+ index (t pk_p_procedure) */
                                f.p_w_doc_type_id,
                                f.p_w_proc_id,
                                nvl(t.display_name, t.proc_name) as ltask,
                                f.profile_type,
                (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                (select min(nvl(up.full_name,up.app_user_name)) from sikp.p_app_user up where up.app_user_name  = puser ) as full_name,
                nvl(min(dt.profile_source),'aspx') as profile_source,
                                count(*) as jumlah
                                from sikp.t_product_order_control f,
                                    sikp.p_document_type dt,
                                    sikp.p_procedure t
                                where
                                f.p_w_proc_id = t.p_procedure_id
                                and f.p_w_doc_type_id = dt.p_document_type_id
                                and t.is_active = 'Y'
                                and f.profile_type not in ('OUTBOX.')
                                --and to_char(nvl(f.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                                and exists (select distinct u.t_product_order_control_id
                                            from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where  f.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                       )
                                group by
                                f.p_w_doc_type_id,
                                f.p_w_proc_id,
                                f.profile_type,
                                t.display_name,
                                t.proc_name

                   --UNION ALL
                   --select
                   ------------------------------------------------------------
                   --- WORKFLOW TROUBLE HANDLING
                   ------------------------------------------------------------
                   --             /*+ index (t pk_p_procedure) */
                   --             f.p_w_doc_type_id,
                   --             f.p_w_proc_id,
                   --             nvl(t.display_name, t.proc_name) as ltask,
                   --             f.profile_type,
                   --             (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
            --  (select min(nvl(up.full_name,up.app_user_name)) from sikp.p_app_user up where up.app_user_name  = puser ) as full_name,
            --  nvl(min(dt.profile_source),'aspx') as profile_source,
                   --             count(*) as jumlah
                   --             from sikp.t_trouble_rec_control f,
                   --                 sikp.p_document_type dt,
                   --                 sikp.p_procedure t
                   --             where
                   --             f.p_w_proc_id = t.p_procedure_id
                   --             and f.p_w_doc_type_id = dt.p_document_type_id
                   --             and t.is_active = 'Y'
                   --             and f.profile_type not in ('OUTBOX.')
                   --             and to_char(nvl(f.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                   --             and exists (select distinct u.t_trouble_rec_control_id
            --                 from sikp.t_user_trou_rec_control u, sikp.p_app_user p
            --                 where  f.t_trouble_rec_control_id = u.t_trouble_rec_control_id
            --             and u.p_app_user_id = p.p_app_user_id
            --             and p.app_user_name = puser
            --          )
                   --             group by
                   --             f.p_w_doc_type_id,
                   --             f.p_w_proc_id,
                   --             f.profile_type,
                   --             t.display_name,
                   --             t.proc_name

     ) loop
                RETURN NEXT v_rec;
    end loop;

    return;

  end;

  ------------------------------------------------------------------------------------
  -- workflow name and jumlah di inbox per user
  ------------------------------------------------------------------------------------
  FUNCTION workflow_name(puser character varying) RETURN SETOF ty_task_profile IS
  surl     varchar2(1500);
  puser_id number;
  vlive    number;
  v_rec    sikp.ty_task_profile;
  begin

     ---CARA PANGGIL: select * from sikp.pack_task_profile.workflow_name('MO7002') AS tbl (ty_task_profile)

     select value
     into vlive
     from sikp.p_global_param
     where code = 'LIVE_IN_INBOX';

     select min(p_app_user_id)
     into puser_id
     from sikp.p_app_user
     where app_user_name = puser;

     for v_rec in (
                select d.p_document_type_id as p_w_doc_type_id,
                       null as p_w_proc_id,
                       null as ltask,
                       nvl(w1.workflow_name, InitCap(Lower(nvl(d.display_name,d.doc_name)))) as profile_type,
                       nvl(max(w1.p_app_user_id),puser_id) as p_app_user_id,
                       nvl(max(w1.p_app_user_id),puser_id) as luser,
                            --'./' || d.profile_source || '?ELEMENT_ID=' ||
                             d.profile_source || '#{ELEMENT_ID:' ||
                            '10' || d.p_document_type_id || '0' || nvl(w1.p_w_proc_id,wf.p_procedure_id_start) ||'0' || nvl(max(w1.p_app_user_id),puser_id) ||
                            ',P_W_DOC_TYPE_ID:' || d.p_document_type_id ||
                            ',P_W_PROC_ID:' || nvl(w1.p_w_proc_id,wf.p_procedure_id_start)  ||
                            ',PROFILE_TYPE:''INBOX'''||
                            ',P_APP_USER_ID:' || nvl(max(w1.p_app_user_id),puser_id) || '}' as url,
                       nvl(sum(w1.jumlah),0) as jumlah
                from sikp.p_workflow wf,
                sikp.p_document_type d,
                  (
                         select
                         ----------------------------------------------------------
                         --- WORKFLOW PENDATARAN WP
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    --d.p_document_type_id = pin_control_wp_1
                                    --and
                                    a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                        and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)
                                    /*
                      UNION ALL

                         select
                         ----------------------------------------------------------
                         --- WORKFLOW PELAPORAN PAJAK
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    d.p_document_type_id = pin_control_wp_2
                                    and
                                    a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                    and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)

                      UNION ALL
             select
                         ----------------------------------------------------------
                         --- WORKFLOW PEMBETULAN WP
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    d.p_document_type_id = pin_control_wp_3
                                    and a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                    and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)
                      UNION ALL
             select
                         ----------------------------------------------------------
                         --- WORKFLOW KURANG BAYAR
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    d.p_document_type_id = pin_control_wp_4
                                    and a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                    and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)
                      UNION ALL
             select
                         ----------------------------------------------------------
                         --- WORKFLOW PEMBETULAN WP
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    d.p_document_type_id = pin_control_wp_5
                                    and a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                    and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)
                                    */
                  ) w1
                where d.p_document_type_id = wf.p_document_type_id and wf.is_active = 'Y' and
                d.p_document_type_id = w1.p_w_doc_type_id (+)
                group by
                d.listing_no,
                d.p_document_type_id,
                d.profile_source,
                w1.p_w_proc_id,
                wf.p_procedure_id_start,
                w1.workflow_name,
                d.display_name,
                d.doc_name
                order by d.listing_no asc
     ) loop
               RETURN NEXT v_rec;
    end loop;
    return;

  end;

  ------------------------------------------------------------------------------------
  -- workflow name for WP and jumlah di inbox per user
  ------------------------------------------------------------------------------------
  FUNCTION workflow_name_wp(puser character varying) RETURN SETOF ty_task_profile IS
  surl     varchar2(1500);
  puser_id number;
  vlive    number;
  v_rec    sikp.ty_task_profile;
  begin

     ---CARA PANGGIL: select * from sikp.pack_task_profile.workflow_name_wp('MO7002') AS tbl (ty_task_profile)

     select value
     into vlive
     from sikp.p_global_param
     where code = 'LIVE_IN_INBOX';

     select min(p_app_user_id)
     into puser_id
     from sikp.p_app_user
     where app_user_name = puser;

     for v_rec in (
                select d.p_document_type_id as p_w_doc_type_id,
                       null as p_w_proc_id,
                       null as ltask,
                       nvl(w1.workflow_name, InitCap(Lower(nvl(d.display_name,d.doc_name)))) as workflow_name,
                       nvl(max(w1.p_app_user_id),puser_id) as p_app_user_id,
                       nvl(max(w1.p_app_user_id),puser_id) as luser,
                            --'./' || d.profile_source || '?ELEMENT_ID=' ||
                             d.profile_source || '#{ELEMENT_ID:' ||
                            '10' || d.p_document_type_id || '0' || nvl(w1.p_w_proc_id,wf.p_procedure_id_start) ||'0' || nvl(max(w1.p_app_user_id),puser_id) ||
                            ',P_W_DOC_TYPE_ID:' || d.p_document_type_id ||
                            ',P_W_PROC_ID:' || nvl(w1.p_w_proc_id,wf.p_procedure_id_start)  ||
                            ',PROFILE_TYPE:''INBOX'''||
                            ',P_APP_USER_ID:' || nvl(max(w1.p_app_user_id),puser_id) || '}' as url,
                       nvl(sum(w1.jumlah),0) as jumlah
                from sikp.p_workflow wf,
                sikp.p_document_type d,
                  (
                         select
                         ----------------------------------------------------------
                         --- WORKFLOW PELAPORAN PAJAK
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    d.p_document_type_id = pin_control_wp_2
                                    and a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                    and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)
                      UNION ALL
             select
                         ----------------------------------------------------------
                         --- WORKFLOW PEMBETULAN WP
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    d.p_document_type_id = pin_control_wp_3
                                    and a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                    and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)
                      UNION ALL
             select
                         ----------------------------------------------------------
                         --- WORKFLOW PEMBETULAN WP
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    d.p_document_type_id = pin_control_wp_4
                                    and a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                    and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)
                     UNION ALL
             select
                         ----------------------------------------------------------
                         --- WORKFLOW PEMBETULAN WP
                         ----------------------------------------------------------
                                    a.p_w_doc_type_id,
                                    nvl(min(d.listing_no),a.p_w_doc_type_id) as listing_no,
                                    d.profile_source,
                                    min(a.p_w_proc_id) as p_w_proc_id,
                                    InitCap(Lower(nvl(d.display_name,d.doc_name))) || ' ' || InitCap(p.code) as workflow_name,
                                    (select min(up.p_app_user_id) from sikp.p_app_user up where up.app_user_name  = puser ) as p_app_user_id,
                                    count(*) as jumlah
                                    from sikp.t_product_order_control a,
                                    sikp.p_document_type d,
                                    sikp.p_procedure t,
                    sikp.t_customer_order o,
                    sikp.p_rqst_type p
                                    where
                                    d.p_document_type_id = pin_control_wp_5
                                    and a.p_w_doc_type_id = d.p_document_type_id
                                    and a.p_w_proc_id = t.p_procedure_id
                                    and t.is_active = 'Y'
                                    and a.profile_type = 'INBOX'
                                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')
                    and o.t_customer_order_id = a.doc_id
                    and o.p_rqst_type_id = p.p_rqst_type_id
                    and exists (select distinct u.t_product_order_control_id
                                from sikp.t_user_prod_order_control u, sikp.p_app_user p
                               where a.t_product_order_control_id = u.t_product_order_control_id
                           and u.p_app_user_id = p.p_app_user_id
                           and p.app_user_name = puser
                           )
                                    group by a.p_w_doc_type_id,
                                    d.profile_source, p.code,
                                    nvl(d.display_name,d.doc_name)
                  ) w1
                where d.p_document_type_id = wf.p_document_type_id and wf.is_active = 'Y' and
                d.p_document_type_id = w1.p_w_doc_type_id (+)
                group by
                d.listing_no,
                d.p_document_type_id,
                d.profile_source,
                w1.p_w_proc_id,
                wf.p_procedure_id_start,
                w1.workflow_name,
                d.display_name,
                d.doc_name
                order by d.listing_no asc
     ) loop
               RETURN NEXT v_rec;
    end loop;
    return;

  end;

  --------------------------------------------------------------------------------------------
  -- workflow summary
  --------------------------------------------------------------------------------------------
  FUNCTION workflow_summary_list(pdoc_type_id numeric, puser character varying) RETURN SETOF ty_workflow_summary IS
  surl     varchar2(128);
  puser_id number;
  luser    varchar2(64);
  vlive    number;
  v_rec    sikp.ty_workflow_summary;
  begin

         --- CARA PANGGIL: SELECT * FROM sikp.pack_task_profile.workflow_summary_list(1,'MO7002') AS tbl (ty_workflow_summary ) ;

         if puser is null then
            return;
         end if;

         select value
         into vlive
         from sikp.p_global_param
         where code = 'LIVE_IN_INBOX';

         select min(p_app_user_id)
         into puser_id
         from sikp.p_app_user
         where app_user_name = puser;


         for v_rec in (
                select
                to_char(a.display_no) || '00000' || to_char(puser_id) as element_id,
                pdoc_type_id     as p_w_doc_type_id,
                -1 p_w_proc_id,
                a.profile_type,
                a.profile_type   as display_name,
                0                as scount,
                'PROFILE'        as stype,
                puser_id         as p_app_user_id,
                (select nvl(max(u.full_name),max(u.app_user_name)) from sikp.p_app_user u where u.p_app_user_id = puser_id) as full_name,
                (select nvl(max(dt.profile_source),'#') from sikp.p_document_type dt where dt.p_document_type_id = pdoc_type_id) as profile_source,
                a.display_no,
                0 as seqno
                from
                sikp.p_w_inbox a
                UNION ALL
                    select
                    to_char(a.display_no)               || '0' ||
                    nvl(to_char(b.p_w_doc_type_id),'0') || '0' ||
                    nvl(to_char(b.p_w_proc_id),'0')     || '0' ||
                    to_char(nvl(b.p_app_user_id,1))        as element_id,
                    b.p_w_doc_type_id,
                    b.p_w_proc_id,
                    a.profile_type,
                    nvl(b.ltask,'')                               as display_name,
                    nvl(sum(b.jumlah),0)                          as scount,
                    decode(nvl(b.ltask,'0'),'0','PROFILE','TASK-'||a.profile_type) as stype,
                    nvl(b.p_app_user_id,1)                 as p_app_user_id,
                    (select nvl(max(u.full_name),max(u.app_user_name)) from sikp.p_app_user u where u.p_app_user_id = nvl(b.p_app_user_id,1)) as full_name,
                    (select nvl(max(dt.profile_source),'#') from sikp.p_document_type dt where dt.p_document_type_id = b.p_w_doc_type_id) as profile_source,
                    a.display_no,
                    b.seqno
                    from sikp.p_w_inbox a,
                    (   select
                        b.profile_type,
                        b.p_w_doc_type_id,
                        b.p_w_proc_id,
                        b.ltask,
                        p.seqno,
                        max(b.p_app_user_id) as p_app_user_id,
                        sum(b.jumlah) as jumlah
                        from sikp.p_procedure p,
                        (select * from sikp.pack_task_profile.task_profile_list(puser)) b
                        where p.p_procedure_id = b.p_w_proc_id
                        and p.is_active = 'Y'
                        group by
                        b.p_w_doc_type_id,
                        b.profile_type,
                        b.p_w_proc_id,
                        p.seqno,
                        b.ltask
                     ) b
                    where a.profile_type = b.profile_type (+)
                    group by
                    b.p_w_doc_type_id,
                    a.display_no,
                    a.profile_type,
                    b.p_w_proc_id,
                    b.seqno,
                    b.ltask,
                    b.p_app_user_id
                    order by display_no, profile_type, seqno

         ) loop
                   RETURN NEXT v_rec;
        end loop;
        return;
  end;


  --------------------------------------------------------------------------------------------
  -- user task list
  --------------------------------------------------------------------------------------------
  FUNCTION user_task_list(vp_w_doc_type_id numeric, vp_w_proc_id numeric, vprofile_type character varying, puser character varying, skeyword character varying DEFAULT NULL::character varying) RETURN SETOF ty_workflow_ctl IS
  findtrue  boolean := true;
  puser_id  number;
  ldocsts   varchar2(64);
  lcustinfo varchar2(3000);
  vada      number;
  vproc_sts varchar2(32);
  vkeyword  varchar2(3000);
  vlive     number;
  vp_product_charac_id number;
  vcust_type varchar2(64);
  v_rec    sikp.ty_workflow_ctl;
  halaman_outbox  number := 0;
  link_outbox varchar2(64);
  begin

         --- CARA PANGGIL : SELECT * FROM sikp.pack_task_profile.user_task_list(1,1,'INBOX','MO7002','') AS tbl (ty_workflow_ctl ) ;

         select "count"(*) into halaman_outbox
        from sikp.p_procedure_files
        where sequence_no = 2 and p_procedure_id = vp_w_proc_id;

        if (halaman_outbox > 0) then
            select filename into link_outbox
            from sikp.p_procedure_files
            where sequence_no = 2 and p_procedure_id = vp_w_proc_id;
        else
            link_outbox := 'blank_page';
        end if;

         select value
         into vlive
         from sikp.p_global_param
         where code = 'LIVE_IN_INBOX';

         if puser is null then
            return;
         end if;

         select min(p_app_user_id)
         into puser_id
         from sikp.p_app_user
         where app_user_name = puser;

         findtrue := true;

         for v_rec in (

               select
                    max(t.t_user_ctl_id) as t_user_ctl_id,
                    t.t_ctl_id,
                    t.p_w_doc_type_id,
                    t.p_w_proc_id,
                    t.doc_id,
                    t.doc_no,
                    t.period,
                    t.profile_type,
            replace(replace(replace(replace(max(t.message),chr(10),''),chr(13),''),'"',''),'''','') as message,
            max(t.recipient) as recipient,
                    t.sender,
                    t.takeover,
                    t.closer,
                    t.ltask,
                    t.read_date,
                    t.doc_sts,
                    t.proc_sts,
                    t.p_app_user_id_donor,
                    t.donor_date,
                    t.p_app_user_id_takeover,
                    t.taken_date,
                    t.p_app_user_id_submit,
                    t.submit_date,
                    t.prev_doc_type_id,
                    t.prev_proc_id,
                    t.prev_doc_id,
                    t.prev_ctl_id,
                    t.slot_1,
                    t.slot_2,
                    t.slot_3,
                    t.slot_4,
                    t.slot_5,
                    max(t.p_app_user_id) as p_app_user_id,
                    t.is_read,
           (select upper(nvl(min(nvl(s.description,s.code)),'1')) from sikp.p_status_list s where s.p_status_list_id = t.doc_sts ) as ldoc_sts,
                min(t.cust_info) as cust_info,
                    t.filename,
            min(t.cust_info) || ' ' || min(t.keyword) as keyword
               from
               (
                    select
                    ---------------------------------------------------------
                    --- USER ORDER
                    ---------------------------------------------------------
                    b.t_user_prod_order_control_id  as t_user_ctl_id,
                    a.t_product_order_control_id as t_ctl_id,
                    a.p_w_doc_type_id,
                    a.p_w_proc_id,
                    a.doc_id,
                    a.doc_no,
                    a.period,
                    a.profile_type,
                    a.message,
                    nvl(u.full_name, u.app_user_name)     as recipient,
                    nvl(don.full_name, don.app_user_name) as sender,
                    nvl(tak.full_name, tak.app_user_name) as takeover,
                    nvl(sub.full_name, sub.app_user_name) as closer,
                    nvl(p.display_name,p.proc_name)   as ltask,
                    b.read_date,
                    a.doc_sts,
                    a.proc_sts,
                    a.p_app_user_id_donor,
                    a.donor_date,
                    nvl(a.p_app_user_id_takeover,puser_id) as p_app_user_id_takeover,
                    a.taken_date,
                    a.p_app_user_id_submit,
                    a.submit_date,
                    a.prev_doc_type_id, a.prev_proc_id, a.prev_doc_id,
                    a.prev_ctl_id,
                    a.slot_1, a.slot_2, a.slot_3, a.slot_4, a.slot_5,
                    b.p_app_user_id,
                    b.is_read,
                    decode(a.profile_type, 'OUTBOX',
                                (
                                case
                                    when halaman_outbox > 0
                                                then link_outbox
                                    else 'blank_page'
                                end ),
                           f.filename
                          ) as filename ,
                    decode(a.p_w_doc_type_id,
                    pin_control_wp_1,
                (select
                replace(replace(min('NAMA BADAN: ' ||
                trim(upper(pa.company_name || ', ORDER NO: ' || o.order_no || ', TGL: ' ||  to_char(o.order_date,'dd/mm/yyyy')))),chr(10),''),chr(13),'')
                from sikp.t_vat_registration pa, sikp.t_customer_order o
                where pa.t_customer_order_id = a.doc_id and pa.t_customer_order_id = o.t_customer_order_id ),
            pin_control_wp_2,
                    (select
                replace(replace(min('NPWD : ' ||
                trim(upper(pa.npwd || ', NO KOHIR: ' || pa.no_kohir ||', NO BAYAR: ' || pa.payment_key || ', TGL: ' ||  to_char(o.order_date,'dd/mm/yyyy')))),chr(10),''),chr(13),'')
                from sikp.t_vat_setllement pa, sikp.t_customer_order o
                where pa.t_customer_order_id = a.doc_id and pa.t_customer_order_id = o.t_customer_order_id ),
                pin_control_wp_5,
                    (select
                replace(replace(min('JENIS SURAT : ' ||
                trim(upper(x.leter_type ||' ke '||to_char(pa.sequence_no)|| ', ORDER NO: ' || o.order_no || ', TGL: ' ||  to_char(o.order_date,'dd/mm/yyyy')))),chr(10),''),chr(13),'')
                from sikp.t_debt_letter pa, sikp.t_customer_order o, sikp.p_debt_letter_type x
                where pa.t_customer_order_id = a.doc_id and pa.t_customer_order_id = o.t_customer_order_id
                      and pa.p_debt_letter_type_id = x.p_debt_letter_type_id
                ),
            pin_control_wp_6,
                    (select
                replace(replace(min('NO REGISTRASI : ' ||
                trim(upper(tbr.registration_no ||' - '||to_char(tbr.wp_name)|| ', ORDER NO: ' || tco.order_no || ', TGL: ' ||  to_char(tco.order_date,'dd/mm/yyyy')))),chr(10),''),chr(13),'')
                from sikp.t_bphtb_registration tbr, sikp.t_customer_order tco
                where tbr.t_customer_order_id = a.doc_id and tbr.t_customer_order_id = tco.t_customer_order_id
                ),
                pin_control_wp_7,
                    (select
                replace(replace(min('JENIS KETETAPAN : ' ||
                trim(upper(x.code ||' ke '||to_char(pa.sequence_no)|| ', ORDER NO: ' || o.order_no || ', TGL: ' ||  to_char(o.order_date,'dd/mm/yyyy')))),chr(10),''),chr(13),'')
                from sikp.t_gen_skpdkb pa, sikp.t_customer_order o, sikp.p_settlement_type x
                where pa.t_customer_order_id = a.doc_id and pa.t_customer_order_id = o.t_customer_order_id
                      and pa.p_settlement_type_id = x.p_settlement_type_id
                ),
            pin_control_wp_8,
                    (select
                replace(replace(min('NPWPD : ' ||
                trim(upper(x.npwd ||', NAMA WP : '||x.wp_name|| ', ORDER NO: ' || o.order_no || ', TGL: ' ||  to_char(o.order_date,'dd/mm/yyyy')))),chr(10),''),chr(13),'')
                from sikp.t_cust_acc_status_modif pa, sikp.t_customer_order o, sikp.t_cust_account x
                where pa.t_customer_order_id = a.doc_id and pa.t_customer_order_id = o.t_customer_order_id
                      and pa.t_cust_account_id = x.t_cust_account_id
                ),
                            (select
                replace(replace(min(trim(upper('ORDER NO: ' || o.order_no || ', TGL: ' ||  to_char(o.order_date,'dd/mm/yyyy')))),chr(10),''),chr(13),'')
                from sikp.t_customer_order o
                where o.t_customer_order_id = a.doc_id
                )
            )  as cust_info,
                    upper(a.doc_no)          || ' ' ||
            --upper(t_vat_set.npwd)    || ' ' ||
                    upper(to_char(a.period)) || ' ' ||
                    upper(a.message)         || ' ' ||
                    upper(nvl(u.full_name, u.app_user_name))     || ' ' ||
                    upper(nvl(don.full_name, don.app_user_name)) || ' ' ||
                    upper(nvl(tak.full_name, tak.app_user_name)) || ' ' ||
                    upper(nvl(sub.full_name, sub.app_user_name)) || ' ' ||
                    upper(nvl(p.display_name,p.proc_name))   || ' ' ||
                    upper(nvl(p.display_name,p.proc_name))   || ' ' ||
                    to_char(b.read_date,  'DD-MON-YYYY') || ' ' ||
                    to_char(a.donor_date, 'DD-MON-YYYY') || ' ' ||
                    to_char(a.taken_date, 'DD-MON-YYYY') || ' ' ||
                    to_char(a.submit_date,'DD-MON-YYYY') || ' ' ||
                    upper(to_char(a.donor_date,'DDMMYYYY')) as keyword
                    from
                    sikp.t_product_order_control a,
                    sikp.t_user_prod_order_control b,
                    sikp.p_procedure p,
                    sikp.p_app_user u,
                    sikp.p_app_user don,
                    sikp.p_app_user tak,
                    sikp.p_app_user sub,
            --sikp.t_vat_setllement t_vat_set,
                    (select f.filename, f.p_procedure_id from sikp.p_procedure_files f where f.sequence_no = 1) f
                    where a.t_product_order_control_id      = b.t_product_order_control_id
                    and a.p_w_proc_id = p.p_procedure_id
                    and b.p_app_user_id = u.p_app_user_id
                    and p.p_procedure_id = f.p_procedure_id
                    and p.is_active = 'Y'
                    and a.p_app_user_id_donor    = don.p_app_user_id
                    and a.p_app_user_id_takeover = tak.p_app_user_id (+)
                    and a.p_app_user_id_submit   = sub.p_app_user_id (+)
                    and a.p_w_doc_type_id = vp_w_doc_type_id
                    and a.p_w_proc_id     = vp_w_proc_id
                    and a.profile_type    = vprofile_type
                    and u.app_user_name = puser
            --and t_vat_set.t_customer_order_id = a.doc_id
                    and to_char(nvl(a.submit_date,sysdate),'YYYYMMDD') >= to_char(sysdate - (vlive * 30),'YYYYMMDD')

                 ) t
               group by
                    t.t_ctl_id,
                    t.p_w_doc_type_id,
                    t.p_w_proc_id,
                    t.doc_id,
                    t.doc_no,
                    t.period,
                    t.profile_type,
                    t.sender,
                    t.takeover,
                    t.closer,
                    t.ltask,
                    t.read_date,
                    t.doc_sts,
                    t.proc_sts,
                    t.p_app_user_id_donor,
                    t.donor_date,
                    t.p_app_user_id_takeover,
                    t.taken_date,
                    t.p_app_user_id_submit,
                    t.submit_date,
                    t.prev_doc_type_id,
                    t.prev_proc_id,
                    t.prev_doc_id,
                    t.prev_ctl_id,
                    t.slot_1,
                    t.slot_2,
                    t.slot_3,
                    t.slot_4,
                    t.slot_5,
                    t.is_read,
                    t.filename
                 order by t.p_w_doc_type_id, t.donor_date asc, t.doc_id asc
         ) loop
                        ------------------------------
                        --- KONVENSI PROC_STS :
                        --- 3 = CANCEL
                        --- 2 = STOPCLOCK
                        --- 1 = CLOSE
                        --- 0 = OPEN
                        ------------------------------

                        RETURN NEXT v_rec;
        end loop;

        return;
  end;
  --------------------------------------------------------------------------------------------
  -- taken_task
  --------------------------------------------------------------------------------------------
  PROCEDURE taken_task(vcurr_ctl_id numeric, vusername character varying DEFAULT NULL::character varying, vcurr_doc_type_id numeric DEFAULT NULL::numeric) IS
  vuser_id_takeover    number := null;
  vcurr_doc_id         number;
  vcurr_proc_id        number;
  vada_taken           number;
  vada_online          number;
  vjmluser             number := 0;
  begin


        if vusername is not null then
            select min(p_app_user_id)
            into vuser_id_takeover
            from sikp.p_app_user
            where app_user_name = vusername;
        end if;

        if nvl(vcurr_doc_type_id,1) in (pin_control_wp_1,pin_control_wp_2) then
        ------------------------------------
        --- WORKFLOW PRODUKSI
        ------------------------------------
                select p_w_proc_id, doc_id
                into vcurr_proc_id, vcurr_doc_id
                from sikp.t_product_order_control
                where t_product_order_control_id = vcurr_ctl_id;

                --- set mo pengambil pertama sebagai pelaksana pekerjaan seterusnya
                --Pertanyaan ??
                if vcurr_proc_id = 1 then
                    /*
                    update sikp.t_network_order a
                    set a.p_app_user_id = nvl(vuser_id_takeover,a.p_app_user_id)
                    where a.t_network_order_id = vcurr_doc_id;
                    */
                    null;
                end if;

                select count(*)
                into vada_taken
                from sikp.t_user_prod_order_control
                where t_product_order_control_id = vcurr_ctl_id
                and p_app_user_id = vuser_id_takeover;

                if vada_taken > 0 then
                    update sikp.t_product_order_control
                    set taken_date = sysdate,
                    p_app_user_id_takeover = nvl(p_app_user_id_takeover,vuser_id_takeover)
                    where t_product_order_control_id = vcurr_ctl_id
                    and taken_date is not null
                    and donor_date = taken_date;

                    update sikp.t_product_order_control
                    set taken_date = nvl(taken_date,sysdate),
                    p_app_user_id_takeover = nvl(p_app_user_id_takeover,vuser_id_takeover)
                    where t_product_order_control_id = vcurr_ctl_id;

                    if vuser_id_takeover is not null then
                        update sikp.t_user_prod_order_control
                        set read_date = sysdate,
                        is_read = 'Y'
                        where t_product_order_control_id = vcurr_ctl_id
                        and p_app_user_id = vuser_id_takeover;

                        ---- periksa pengambil hanya user lebih dari satu
                        select count(*)
                        into vjmluser
                        from sikp.t_user_prod_order_control
                        where t_product_order_control_id = vcurr_ctl_id;

                        select count(*)
                        into vada_taken
                        from sikp.t_user_prod_order_control
                        where t_product_order_control_id = vcurr_ctl_id
                        and p_app_user_id not in (vuser_id_takeover);

                        if vjmluser > 1 and vada_taken > 0 then

                                --- hanya user yang pertama mengambil pekerjaan yang berhak meneruskan pekerjaan
                                delete from sikp.t_user_prod_order_control w where w.t_product_order_control_id = vcurr_ctl_id and w.read_date is null
                                and w.p_app_user_id not in (vuser_id_takeover)
                                and not exists (
                                    select 1
                                    from sikp.t_w_delegation_ctl x
                                    where x.p_w_doc_type_id = vcurr_doc_type_id
                                    and x.p_w_proc_id = vcurr_proc_id
                                    and x.approval_date is not null
                                    and trunc(sysdate) between trunc(x.valid_from) and nvl(x.valid_to,sysdate+1)
                                    and x.p_app_user_id_new = w.p_app_user_id
                                   );

                        end if;

                    end if;
                end if;

        elsif nvl(vcurr_doc_type_id,1) in (pin_control_wp_3) then
                null;
        -- ------------------------------------
        -- --- WORKFLOW TROUBLE HANDLING
        -- ------------------------------------
                -- select p_w_proc_id, doc_id
                -- into vcurr_proc_id, vcurr_doc_id
                -- from sikp.t_trouble_rec_control
                -- where t_trouble_rec_control_id = vcurr_ctl_id;
                --
                -- --- set mo pengambil pertama sebagai pelaksana pekerjaan seterusnya
                -- if vcurr_proc_id = 1 then
                --     update sikp.t_trouble_record a
                --     set a.p_app_user_id = nvl(vuser_id_takeover,a.p_app_user_id)
                --     where a.t_trouble_record_id = vcurr_doc_id;
                -- end if;
                --
                -- select count(*)
                -- into vada_taken
                -- from sikp.t_user_trou_rec_control
                -- where t_trouble_rec_control_id = vcurr_ctl_id
                -- and p_app_user_id = vuser_id_takeover;
                --
                -- if vada_taken > 0 then
                --     update sikp.t_trouble_rec_control
                --     set taken_date = sysdate,
                --     p_app_user_id_takeover = nvl(p_app_user_id_takeover,vuser_id_takeover)
                --     where t_trouble_rec_control_id = vcurr_ctl_id
                --     and taken_date is not null
                --     and donor_date = taken_date;
                --
                --     update sikp.t_trouble_rec_control
                --     set taken_date = nvl(taken_date,sysdate),
                --     p_app_user_id_takeover = nvl(p_app_user_id_takeover,vuser_id_takeover)
                --     where t_trouble_rec_control_id = vcurr_ctl_id;
                --
                --     if vuser_id_takeover is not null then
                --         update sikp.t_user_trou_rec_control
                --         set read_date = sysdate,
                --         is_read = 'Y'
                --         where t_trouble_rec_control_id = vcurr_ctl_id
                --         and p_app_user_id = vuser_id_takeover;
                --
                --         ---- periksa pengambil hanya user lebih dari satu
                --         select count(*)
                --         into vjmluser
                --         from sikp.t_user_trou_rec_control
                --         where t_trouble_rec_control_id = vcurr_ctl_id;
                --
                --         select count(*)
                --         into vada_taken
                --         from sikp.t_user_trou_rec_control
                --         where t_trouble_rec_control_id = vcurr_ctl_id
                --         and p_app_user_id not in (vuser_id_takeover);
                --
                --         if vjmluser > 1 and vada_taken > 0 then
                --
                --                 --- hanya user yang pertama mengambil pekerjaan yang berhak meneruskan pekerjaan
                --                 delete from sikp.t_user_trou_rec_control w where w.t_trouble_rec_control_id = vcurr_ctl_id and w.read_date is null
                --                 and w.p_app_user_id not in (vuser_id_takeover)
                --                 and not exists (
                --                     select 1
                --                     from sikp.t_w_delegation_ctl x
                --                     where x.p_w_doc_type_id = vcurr_doc_type_id
                --                     and x.p_w_proc_id = vcurr_proc_id
                --                     and x.approval_date is not null
                --                     and trunc(sysdate) between trunc(x.valid_from) and nvl(x.valid_to,sysdate+1)
                --                     and x.p_app_user_id_new = w.p_app_user_id
                --                    );
                --
                --         end if;
                --
                --     end if;
                -- end if;
     end if;

        commit;

  end;
  --------------------------------------------------------------------------------------------
  -- stopclock_entry
  --------------------------------------------------------------------------------------------
  PROCEDURE stopclock_entry(vcurr_ctl_id numeric, vp_w_doc_type_id numeric, vp_w_proc_id numeric, vdoc_id numeric, vp_stop_clock_type_id numeric, vreason1 character varying, vreason2 character varying, vuserlogin character varying) IS
  vada   number;
  lin_id number;
  vada_fraud      number;
  vpuser_id       number;
  vlast_stopclock number;
  begin

        select p_app_user_id
        into vpuser_id
        from sikp.p_app_user
        where app_user_name = vuserlogin;

        ---- periksa apakah stopclock atau release
        select count(*)
        into vada
        from sikp.t_w_stopclock_ctl
        where control_id = vcurr_ctl_id
        and p_w_doc_type_id = vp_w_doc_type_id
        and p_w_proc_id = vp_w_proc_id
        and doc_id = vdoc_id
        and stop_clock_status = 1;

        ----- insert stopclock
        if vada = 0 then

                select nvl(sum(release_date_time - stop_date_time),0)
                into vlast_stopclock
                from sikp.t_w_stopclock_ctl
                where control_id = vcurr_ctl_id
                and p_w_doc_type_id = vp_w_doc_type_id
                and p_w_proc_id = vp_w_proc_id
                and doc_id = vdoc_id
                and release_date_time is not null;

                if vlast_stopclock <> 0 then
                     delete from sikp.t_w_stopclock_ctl
                     where control_id = vcurr_ctl_id
                     and p_w_doc_type_id = vp_w_doc_type_id
                     and p_w_proc_id = vp_w_proc_id
                     and doc_id = vdoc_id;

                     commit;
                end if;

                select sikp.seq_t_w_stopclock_ctl_id.nextval into lin_id  from dual;

                --- 1 = stopclock ,  0 = release
                insert into sikp.t_w_stopclock_ctl (
                    t_w_stopclock_ctl_id,
                    control_id,
                    p_w_doc_type_id,
                    p_w_proc_id,
                    doc_id,
                    p_stop_clock_type_id,
                    p_app_user_id_stop,
                    stop_date_time,
                    stop_reason,
                    p_app_user_id_verify,
                    verif_date_time,
                    verif_reason,
                    p_app_user_id_release,
                    release_date_time,
                    release_reason,
                    stop_clock_status,
                    last_stopcount_days  ) values (
                      lin_id,
                      vcurr_ctl_id,
                      vp_w_doc_type_id,
                      vp_w_proc_id,
                      vdoc_id,
                      vp_stop_clock_type_id,
                      vpuser_id,
                      sysdate,
                      vreason1,
                      vpuser_id,
                      sysdate,
                      '-',
                      null,
                      null,
                      '-',
                      1,
                      vlast_stopclock
                );

                if vp_w_doc_type_id in (pin_control_wp_1,pin_control_wp_2) then
                   update sikp.t_product_order_control
                   set proc_sts = 2   --- stopclock
                   where t_product_order_control_id = vcurr_ctl_id;

        elsif vp_w_doc_type_id in (pin_control_wp_3) then
                   update sikp.t_trouble_rec_control
                   set proc_sts = 2   --- stopclock
                   where t_trouble_rec_control_id = vcurr_ctl_id;
                end if;

        else
                --- periksa app fraud
                ---------------------------
                select count(*)
                into vada_fraud
                from sikp.t_w_stopclock_ctl a, sikp.afr_process b
                where a.control_id = vcurr_ctl_id
                and a.p_w_doc_type_id = vp_w_doc_type_id
                and a.p_w_proc_id = vp_w_proc_id
                and a.doc_id = vdoc_id
                and a.afr_process_id = b.afr_process_id
                and b.treatment_status_id not in (62)
                and a.afr_process_id is not null;

                if vada_fraud > 0 then
                    return;
                end if;

                ----- boleh release stopclock
                -------------------------------
                select sum(nvl(release_date_time,sysdate) - stop_date_time)
                into vlast_stopclock
                from sikp.t_w_stopclock_ctl
                where control_id = vcurr_ctl_id
                and p_w_doc_type_id = vp_w_doc_type_id
                and p_w_proc_id = vp_w_proc_id
                and doc_id = vdoc_id;

                update sikp.t_w_stopclock_ctl
                set     p_app_user_id_release = vpuser_id,
                        release_date_time = sysdate,
                        release_reason = vreason2,
                        stop_clock_status = 0,
                        last_stopcount_days = nvl(last_stopcount_days,0) + vlast_stopclock
                where control_id = vcurr_ctl_id
                and p_w_doc_type_id = vp_w_doc_type_id
                and p_w_proc_id = vp_w_proc_id
                and doc_id = vdoc_id
                and rownum = 1;

                if vp_w_doc_type_id in (pin_control_wp_1,pin_control_wp_2) then
                   update sikp.t_product_order_control
                   set proc_sts = 0   --- open
                   where t_product_order_control_id = vcurr_ctl_id;

                elsif vp_w_doc_type_id in (pin_control_wp_3) then
                   update sikp.t_trouble_rec_control
                   set proc_sts = 0   --- open
                   where t_trouble_rec_control_id = vcurr_ctl_id;

                end if;

        end if;

        commit;

  end;

  -----------------------------------------------------------------------------------------------------------------------------------------------------------
  -- ambil jenis stop clock   (generic)
  ------------------------------------------------------------------------------------------------------------------------------------------------------------
  FUNCTION p_clock_type_list(skeyword1 character varying DEFAULT NULL::character varying, skeyword2 character varying DEFAULT NULL::character varying, skeyword3 character varying DEFAULT NULL::character varying, skeyword4 character varying DEFAULT NULL::character varying, skeyword5 character varying DEFAULT NULL::character varying, param1 character varying DEFAULT NULL::character varying, param2 character varying DEFAULT NULL::character varying, param3 character varying DEFAULT NULL::character varying, param4 character varying DEFAULT NULL::character varying, param5 character varying DEFAULT NULL::character varying) RETURN SETOF ty_lovcx IS
  vmessage varchar2(256);
  v_rec sikp.ty_lovcx;
  begin
     pada := 0;
     for v_rec in (
                    select
                        c.stop_clock_type as message,
                        c.stop_clock_type || ' ' || c.description || ' ' || c.update_by  as keyword,
                        'ID'           as label1, c.p_stop_clock_type_id              as value1,
                        'Jenis Alasan' as label2, c.stop_clock_type                   as value2,
                        'Keterangan'   as label3, c.description                       as value3,
                        'Tanggal'      as label4, to_char(c.update_date,'DD-MM-YYYY') as value4,
                        'Pembuat'      as label5, c.update_by                         as value5,
                        '' label6, '' value6,
                        '' label7, '' value7,
                        '' label8, '' value8,
                        '' label9, '' value9,
                        '' label10,'' value10,
                        '' label11,'' value11
                    from sikp.p_stop_clock_type c
                    where c.is_active = 'Y'

     ) loop
                RETURN NEXT v_rec;
    end loop;

    return;

  end;


  -----------------------------------------------------------------------------------------------------------------------------------------------------------
  -- broadcaster
  ------------------------------------------------------------------------------------------------------------------------------------------------------------
  FUNCTION broadcaster(vusername character varying) RETURN SETOF ty_broadcast_ctl IS
  vmessage  varchar2(2054);
  vparent_id number;
  vlevel_id  number;
  vp_organization_id number;
  vpostcast  varchar2(3000);
  xi         number := 0;
  v_rec sikp.ty_broadcast_ctl;
  begin

     --- cari organisasi regional
     select
     max(c.p_organization_id),
     nvl(max(c.parent_id),max(c.p_organization_id))
     into
     vp_organization_id,
     vparent_id
     from sikp.p_app_user_organ a,
     sikp.p_app_user b,
     sikp.p_organization c
     where a.p_user_id = b.p_app_user_id
     and b.app_user_name = vusername
     and a.p_organization_id = c.p_organization_id;
     -----
     while vparent_id is not null
     loop
         select
         max(p_organization_id),
         max(parent_id),
         max(p_organization_level_id)
         into
         vp_organization_id,
         vparent_id,
         vlevel_id
         from sikp.p_organization
         where p_organization_id = vparent_id;
         xi := xi + 1;
         if vlevel_id = 2 or xi > 11 then
            exit;
         end if;
     end loop;
     ------------------
     xi := 0;
     for v_rec in (
                    select
                    c.t_w_broadcast_ctl_id,
                    c.valid_from,
                    c.valid_to,
                    c.user_name_entry,
                    c.p_organ_input_id,
                    c.is_private,
                    c.p_organ_regional_id,
                    replace(replace(c.postcast || ' '||chr(10)||'Posted: '||to_char(c.valid_from,'DD-Mon-YYYY')||chr(10)||chr(10),chr(10),''),chr(13),'') as postcast
                    from sikp.t_w_broadcast_ctl c
                    where
                    trunc(sysdate) between trunc(c.valid_from) and nvl(c.valid_to,sysdate + 1)
                    and ((
                        exists (
                           select 1
                           from sikp.p_app_user_organ o,
                           sikp.p_app_user u
                           where o.p_user_id = u.p_app_user_id
                           and u.app_user_name = vusername
                           and c.is_private = 'Y'
                           and c.p_organ_input_id = o.p_organization_id  ) or
                        exists (
                           select 1
                           from sikp.p_organization o
                           where c.p_organ_regional_id = o.p_organization_id
                           and decode(c.p_organ_regional_id,1,'Y',c.is_private) = 'Y' )
                    ))
                    order by c.t_w_broadcast_ctl_id desc

     ) loop
              vpostcast := substr(v_rec.postcast||vpostcast,1,3300);
              xi := xi + 1;
              RETURN NEXT v_rec;
    end loop;

    if xi = 0 then
        for v_rec in (
        select
        null,
        null,
        null,
        null,
        null,
        null,
        substr(vpostcast,1,3300)
         ) loop
            RETURN NEXT v_rec;
        end loop;
    end if;

  end;

END pack_task_profile;