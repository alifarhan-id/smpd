-- update file_name yang berkaitan dengan workflow
update sikp.p_app_menu
set file_name = ('workflow.' || substr(file_name, 7, length(file_name)-10))
where parent_id = 37;

-- update file path pada p_procedure_files
update sikp.p_procedure_files
set filename = lower(replace(substr(filename,4, length(filename)-7),'/','.'));


update sikp.p_procedure_files
set filename = 'transaksi'||substr(filename, 6)
where filename like '%trans%';


-- update file_name p_app_menu
update sikp.p_app_menu
set file_name = 'workflow.chart_proc'
where p_app_menu_id = 42;


update sikp.p_app_menu
set is_active = 'N'
where p_app_menu_id IN (43, 38);


update sikp.p_document_type
set profile_source = 'workflow.workflow_summary';


INSERT INTO sikp.p_application(p_application_id, code, listing_no, description, creation_date, created_by, updated_date, updated_by, module_icon, is_active)
VALUES(999, 'INBOX', 99, '', sysdate, 'ADMIN', sysdate, 'ADMIN', 'images/md_01_on.png', 'Y');

INSERT INTO sikp.p_application_role(p_application_role_id, p_app_role_id, p_application_id, valid_from, valid_to, description, creation_date, created_by, updated_date, updated_by)
SELECT (sikp.generate_id('sikp','p_application_role','p_application_role_id') + p_app_role_id - 1), p_app_role_id, 999, sysdate, null, '', sysdate, 'ADMIN', sysdate, 'ADMIN'
from sikp.p_app_role
order by p_app_role_id;


update sikp.p_application
set module_icon = 'images/md_02_on.png'
where code = 'PARAMETER';

update sikp.p_application
set module_icon = 'images/md_03_on.png'
where code = 'DATA MASTER';


update sikp.p_application
set module_icon = 'images/md_04_on.png'
where code = 'REKONSILIASI';

update sikp.p_application
set module_icon = 'images/md_05_on.png'
where code = 'TRANSAKSI';

update sikp.p_application
set module_icon = 'images/md_06_on.png'
where code = 'PELAPORAN';

update sikp.p_application
set module_icon = 'images/md_07_on.png'
where code = 'BPHTB';

update sikp.p_application
set module_icon = 'images/md_08_on.png'
where code = 'PPAT';

update sikp.p_application
set module_icon = 'images/md_09_on.png'
where code = 'EXECUTIVE SUMMARY REPORT';

update sikp.p_application
set module_icon = 'images/md_10_on.png'
where code = 'ISO';

update sikp.p_application
set module_icon = 'images/md_11_on.png'
where code = 'CHATTING';


CREATE OR REPLACE VIEW sikp.v_workflow AS
select   a.p_workflow_id,
            a.doc_name,
            a.display_name,
            a.p_document_type_id,
            a.p_procedure_id_start,
            a.is_active,
            a.description,
            a.updated_date,
            a.updated_by,
            a.created_by,
            a.creation_date,
            b.display_name as document_type_code,
            c.display_name as procedure_code
     from         p_workflow a
               left join
                  p_document_type b
               on a.p_document_type_id = b.p_document_type_id
            left join
               p_procedure c
            on a.p_procedure_id_start = c.p_procedure_id;



CREATE OR REPLACE VIEW sikp.v_wf_chart_next AS
 SELECT a.p_w_chart_proc_id, a.create_by,
    a.create_date,
    a.p_workflow_id,
    a.p_procedure_id_prev,
    a.p_procedure_id_next,
    a.p_procedure_id_alt,
    a.importance_level,
    a.p_w_chart_proc_id AS p_w_chart_proc_id_next,
    b.doc_name,
    c.proc_name AS proc_name_prev,
    nvl(c.display_name, c.proc_name) AS proc_display_prev,
    to_char(nvl(d.proc_name, 'BERHENTI'::character varying)) AS proc_name_next,
    to_char(nvl(d.display_name, nvl(d.proc_name, 'BERHENTI'::character varying))) AS proc_display_next,
    alt.proc_name AS proc_name_alt,
    nvl(alt.display_name, alt.proc_name) AS proc_display_alt,
    d.f_after,
    d.f_before,
    d.description,
    d.seqno,
    to_char(
        DECODE(  nvl(a.f_init, 'N'::character varying)::text::character varying
            , 'N'::text
            , 'TIDAK'::text
            , 'YA'::text::character varying
        )) AS linitchild,
    a.f_init,
    to_char(a.valid_from,'yyyy-mm-dd')as valid_from,
    to_char(a.valid_to,'yyyy-mm-dd')as valid_to,
    a.update_date,
    a.update_by,
    ( SELECT to_char(
                DECODE(  count(*)::text::integer
                    , 0
                    , 'KADALUWARSA'::text
                    ,
                    DECODE(  nvl(d.is_active::character varying, 'Y'::character varying)::text::character varying
                        , 'Y'::text
                        , 'ON'::text
                        , 'OFF'::text::character varying
                    )::text::character varying
                )) AS to_char
           FROM dual
          WHERE clock_timestamp()::timestamp(0) without time zone >= trunc(a.valid_from) AND clock_timestamp()::timestamp(0) without time zone <= nvl(a.valid_to::timestamp with time zone, (clock_timestamp()::timestamp(0) without time zone + 1)::timestamp with time zone)) AS lvalid,
    to_char(upper((((((((((b.doc_name::text || ' '::text) || c.proc_name::text) || ' '::text) || d.proc_name::text) || ' '::text) || d.f_after::text) || ' '::text) || d.f_before::text) || ' '::text) || d.description::text)::character varying) AS skeyword
   FROM p_w_chart_proc a
     LEFT JOIN p_procedure alt ON a.p_procedure_id_alt = alt.p_procedure_id
     LEFT JOIN p_procedure d ON a.p_procedure_id_next = d.p_procedure_id
     CROSS JOIN p_workflow b
     CROSS JOIN p_procedure c
  WHERE a.p_workflow_id = b.p_workflow_id AND a.p_procedure_id_prev = c.p_procedure_id AND nvl(d.is_active::character varying, 'Y'::character varying)::text = 'Y'::text
  ORDER BY (nvl(d.seqno, 100::numeric));

ALTER TABLE v_wf_chart_next
  OWNER TO sikp;
GRANT ALL ON TABLE v_wf_chart_next TO sikp;

CREATE OR REPLACE VIEW v_wf_chart_prev AS 
SELECT DISTINCT a.p_workflow_id,
    a.p_procedure_id_prev,
    nvl(c.display_name, c.proc_name) AS proc_display_prev,
    a.sequence_no
   FROM p_w_chart_proc a,
    p_workflow b,
    p_procedure c
  WHERE a.p_workflow_id = b.p_workflow_id AND a.p_procedure_id_prev = c.p_procedure_id AND c.is_active = 'Y'::bpchar 
  ORDER BY a.sequence_no;
  

update sikp.p_procedure_files 
set filename = 'transaksi_wf.t_vat_registration_srt_ro'
where p_procedure_files_id = 17;

update sikp.p_procedure_files 
set filename = 'transaksi_wf.t_vat_registration_ro'
where p_procedure_files_id in(3,4,16,2);

update sikp.p_procedure_files 
set filename = 'transaksi_wf.t_vat_registration_ver_ro'
where p_procedure_files_id = 1;

update sikp.p_procedure_files 
set filename = 'transaksi_wf.t_vat_registration_bap_ro'
where p_procedure_files_id = 5;

update sikp.p_procedure_files 
set filename = 'transaksi_wf.t_vat_registration_kasi_ro'
where p_procedure_files_id = 21;

update p_procedure_files
set filename = replace(filename, 'transaksi', 'transaksi_wf')
where filename not like '%_wf%';