--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: icons; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE icons (
    icon_id integer NOT NULL,
    icon_code character varying(255) NOT NULL,
    icon_description character varying(255),
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE icons OWNER TO agripro;

--
-- Name: logs; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE logs (
    log_id integer NOT NULL,
    log_desc character varying(255) NOT NULL,
    log_user character varying(25),
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE logs OWNER TO agripro;

--
-- Name: menus; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE menus (
    menu_id integer NOT NULL,
    p_application_id integer,
    parent_id integer,
    menu_title character varying(100) NOT NULL,
    menu_url character varying(255),
    menu_icon character varying(50),
    menu_order integer NOT NULL,
    menu_description character varying(255),
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE menus OWNER TO agripro;

--
-- Name: p_application; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE p_application (
    p_application_id integer NOT NULL,
    code character varying(100) NOT NULL,
    description character varying(255),
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date,
    is_active character varying(1),
    module_icon character varying(100)
);


ALTER TABLE p_application OWNER TO agripro;

--
-- Name: permission_menu; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE permission_menu (
    menu_id integer,
    permission_id integer,
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE permission_menu OWNER TO agripro;

--
-- Name: permission_role; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE permission_role (
    role_id integer,
    permission_id integer,
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE permission_role OWNER TO agripro;

--
-- Name: permissions; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE permissions (
    permission_id integer NOT NULL,
    permission_name character varying(100) NOT NULL,
    permission_display_name character varying(255),
    permission_description character varying(255),
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE permissions OWNER TO agripro;

--
-- Name: role_menu; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE role_menu (
    role_id integer,
    menu_id integer,
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE role_menu OWNER TO agripro;

--
-- Name: p_application_role; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE p_application_role (
    p_application_id integer,
    role_id integer,
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE p_application_role OWNER TO agripro;

--
-- Name: role_user; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE role_user (
    user_id integer,
    role_id integer,
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date
);


ALTER TABLE role_user OWNER TO agripro;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE roles (
    role_id integer NOT NULL,
    role_name character varying(255) NOT NULL,
    role_description character varying(255),
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date,
    is_active character varying(1)
);


ALTER TABLE roles OWNER TO agripro;

--
-- Name: users; Type: TABLE; Schema: public; Owner: agripro; Tablespace: 
--

CREATE TABLE users (
    user_id integer NOT NULL,
    user_name character varying(50) NOT NULL,
    user_full_name character varying(255) NOT NULL,
    user_email character varying(100),
    user_password character varying(255) NOT NULL,
    created_by character varying(25),
    created_date date,
    updated_by character varying(25),
    updated_date date,
    user_status character varying(1)
);


ALTER TABLE users OWNER TO agripro;

--
-- Data for Name: icons; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY icons (icon_id, icon_code, icon_description, created_by, created_date, updated_by, updated_date) FROM stdin;
1	fa fa-adjust	\N	admin	2017-05-29	admin	2017-05-29
2	fa fa-adn	\N	admin	2017-05-29	admin	2017-05-29
3	fa fa-align-center	\N	admin	2017-05-29	admin	2017-05-29
4	fa fa-align-justify	\N	admin	2017-05-29	admin	2017-05-29
5	fa fa-align-left	\N	admin	2017-05-29	admin	2017-05-29
6	fa fa-align-right	\N	admin	2017-05-29	admin	2017-05-29
7	fa fa-ambulance	\N	admin	2017-05-29	admin	2017-05-29
8	fa fa-anchor	\N	admin	2017-05-29	admin	2017-05-29
9	fa fa-android	\N	admin	2017-05-29	admin	2017-05-29
10	fa fa-angellist	\N	admin	2017-05-29	admin	2017-05-29
11	fa fa-angle-double-down	\N	admin	2017-05-29	admin	2017-05-29
12	fa fa-angle-double-left	\N	admin	2017-05-29	admin	2017-05-29
13	fa fa-angle-double-right	\N	admin	2017-05-29	admin	2017-05-29
14	fa fa-angle-double-up	\N	admin	2017-05-29	admin	2017-05-29
15	fa fa-angle-down	\N	admin	2017-05-29	admin	2017-05-29
16	fa fa-angle-left	\N	admin	2017-05-29	admin	2017-05-29
17	fa fa-angle-right	\N	admin	2017-05-29	admin	2017-05-29
18	fa fa-angle-up	\N	admin	2017-05-29	admin	2017-05-29
19	fa fa-apple	\N	admin	2017-05-29	admin	2017-05-29
20	fa fa-archive	\N	admin	2017-05-29	admin	2017-05-29
21	fa fa-area-chart	\N	admin	2017-05-29	admin	2017-05-29
22	fa fa-arrow-circle-down	\N	admin	2017-05-29	admin	2017-05-29
23	fa fa-arrow-circle-left	\N	admin	2017-05-29	admin	2017-05-29
24	fa fa-arrow-circle-o-down	\N	admin	2017-05-29	admin	2017-05-29
25	fa fa-arrow-circle-o-left	\N	admin	2017-05-29	admin	2017-05-29
26	fa fa-arrow-circle-o-right	\N	admin	2017-05-29	admin	2017-05-29
27	fa fa-arrow-circle-o-up	\N	admin	2017-05-29	admin	2017-05-29
28	fa fa-arrow-circle-right	\N	admin	2017-05-29	admin	2017-05-29
29	fa fa-arrow-circle-up	\N	admin	2017-05-29	admin	2017-05-29
30	fa fa-arrow-down	\N	admin	2017-05-29	admin	2017-05-29
31	fa fa-arrow-left	\N	admin	2017-05-29	admin	2017-05-29
32	fa fa-arrow-right	\N	admin	2017-05-29	admin	2017-05-29
33	fa fa-arrow-up	\N	admin	2017-05-29	admin	2017-05-29
34	fa fa-arrows	\N	admin	2017-05-29	admin	2017-05-29
35	fa fa-arrows-alt	\N	admin	2017-05-29	admin	2017-05-29
36	fa fa-arrows-h	\N	admin	2017-05-29	admin	2017-05-29
37	fa fa-arrows-v	\N	admin	2017-05-29	admin	2017-05-29
38	fa fa-asterisk	\N	admin	2017-05-29	admin	2017-05-29
39	fa fa-at	\N	admin	2017-05-29	admin	2017-05-29
40	fa fa-automobile	\N	admin	2017-05-29	admin	2017-05-29
41	fa fa-backward	\N	admin	2017-05-29	admin	2017-05-29
42	fa fa-ban	\N	admin	2017-05-29	admin	2017-05-29
43	fa fa-bank	\N	admin	2017-05-29	admin	2017-05-29
44	fa fa-bar-chart	\N	admin	2017-05-29	admin	2017-05-29
45	fa fa-bar-chart-o	\N	admin	2017-05-29	admin	2017-05-29
46	fa fa-barcode	\N	admin	2017-05-29	admin	2017-05-29
47	fa fa-bars	\N	admin	2017-05-29	admin	2017-05-29
48	fa fa-bed	\N	admin	2017-05-29	admin	2017-05-29
49	fa fa-beer	\N	admin	2017-05-29	admin	2017-05-29
50	fa fa-behance	\N	admin	2017-05-29	admin	2017-05-29
51	fa fa-behance-square	\N	admin	2017-05-29	admin	2017-05-29
52	fa fa-bell	\N	admin	2017-05-29	admin	2017-05-29
53	fa fa-bell-o	\N	admin	2017-05-29	admin	2017-05-29
54	fa fa-bell-slash	\N	admin	2017-05-29	admin	2017-05-29
55	fa fa-bell-slash-o	\N	admin	2017-05-29	admin	2017-05-29
56	fa fa-bicycle	\N	admin	2017-05-29	admin	2017-05-29
57	fa fa-binoculars	\N	admin	2017-05-29	admin	2017-05-29
58	fa fa-birthday-cake	\N	admin	2017-05-29	admin	2017-05-29
59	fa fa-bitbucket	\N	admin	2017-05-29	admin	2017-05-29
60	fa fa-bitbucket-square	\N	admin	2017-05-29	admin	2017-05-29
61	fa fa-bitcoin	\N	admin	2017-05-29	admin	2017-05-29
62	fa fa-bold	\N	admin	2017-05-29	admin	2017-05-29
63	fa fa-bolt	\N	admin	2017-05-29	admin	2017-05-29
64	fa fa-bomb	\N	admin	2017-05-29	admin	2017-05-29
65	fa fa-book	\N	admin	2017-05-29	admin	2017-05-29
66	fa fa-bookmark	\N	admin	2017-05-29	admin	2017-05-29
67	fa fa-bookmark-o	\N	admin	2017-05-29	admin	2017-05-29
68	fa fa-briefcase	\N	admin	2017-05-29	admin	2017-05-29
69	fa fa-btc	\N	admin	2017-05-29	admin	2017-05-29
70	fa fa-bug	\N	admin	2017-05-29	admin	2017-05-29
71	fa fa-building	\N	admin	2017-05-29	admin	2017-05-29
72	fa fa-building-o	\N	admin	2017-05-29	admin	2017-05-29
73	fa fa-bullhorn	\N	admin	2017-05-29	admin	2017-05-29
74	fa fa-bullseye	\N	admin	2017-05-29	admin	2017-05-29
75	fa fa-bus	\N	admin	2017-05-29	admin	2017-05-29
76	fa fa-buysellads	\N	admin	2017-05-29	admin	2017-05-29
77	fa fa-cab	\N	admin	2017-05-29	admin	2017-05-29
78	fa fa-calculator	\N	admin	2017-05-29	admin	2017-05-29
79	fa fa-calendar	\N	admin	2017-05-29	admin	2017-05-29
80	fa fa-calendar-o	\N	admin	2017-05-29	admin	2017-05-29
81	fa fa-camera	\N	admin	2017-05-29	admin	2017-05-29
82	fa fa-camera-retro	\N	admin	2017-05-29	admin	2017-05-29
83	fa fa-car	\N	admin	2017-05-29	admin	2017-05-29
84	fa fa-caret-down	\N	admin	2017-05-29	admin	2017-05-29
85	fa fa-caret-left	\N	admin	2017-05-29	admin	2017-05-29
86	fa fa-caret-right	\N	admin	2017-05-29	admin	2017-05-29
87	fa fa-caret-square-o-down	\N	admin	2017-05-29	admin	2017-05-29
88	fa fa-caret-square-o-left	\N	admin	2017-05-29	admin	2017-05-29
89	fa fa-caret-square-o-right	\N	admin	2017-05-29	admin	2017-05-29
90	fa fa-caret-square-o-up	\N	admin	2017-05-29	admin	2017-05-29
91	fa fa-caret-up	\N	admin	2017-05-29	admin	2017-05-29
92	fa fa-cart-arrow-down	\N	admin	2017-05-29	admin	2017-05-29
93	fa fa-cart-plus	\N	admin	2017-05-29	admin	2017-05-29
94	fa fa-cc	\N	admin	2017-05-29	admin	2017-05-29
95	fa fa-cc-amex	\N	admin	2017-05-29	admin	2017-05-29
96	fa fa-cc-discover	\N	admin	2017-05-29	admin	2017-05-29
97	fa fa-cc-mastercard	\N	admin	2017-05-29	admin	2017-05-29
98	fa fa-cc-paypal	\N	admin	2017-05-29	admin	2017-05-29
99	fa fa-cc-stripe	\N	admin	2017-05-29	admin	2017-05-29
100	fa fa-cc-visa	\N	admin	2017-05-29	admin	2017-05-29
101	fa fa-certificate	\N	admin	2017-05-29	admin	2017-05-29
102	fa fa-chain	\N	admin	2017-05-29	admin	2017-05-29
103	fa fa-chain-broken	\N	admin	2017-05-29	admin	2017-05-29
104	fa fa-check	\N	admin	2017-05-29	admin	2017-05-29
105	fa fa-check-circle	\N	admin	2017-05-29	admin	2017-05-29
106	fa fa-check-circle-o	\N	admin	2017-05-29	admin	2017-05-29
107	fa fa-check-square	\N	admin	2017-05-29	admin	2017-05-29
108	fa fa-check-square-o	\N	admin	2017-05-29	admin	2017-05-29
109	fa fa-chevron-circle-down	\N	admin	2017-05-29	admin	2017-05-29
110	fa fa-chevron-circle-left	\N	admin	2017-05-29	admin	2017-05-29
111	fa fa-chevron-circle-right	\N	admin	2017-05-29	admin	2017-05-29
112	fa fa-chevron-circle-up	\N	admin	2017-05-29	admin	2017-05-29
113	fa fa-chevron-down	\N	admin	2017-05-29	admin	2017-05-29
114	fa fa-chevron-left	\N	admin	2017-05-29	admin	2017-05-29
115	fa fa-chevron-right	\N	admin	2017-05-29	admin	2017-05-29
116	fa fa-chevron-up	\N	admin	2017-05-29	admin	2017-05-29
117	fa fa-child	\N	admin	2017-05-29	admin	2017-05-29
118	fa fa-circle	\N	admin	2017-05-29	admin	2017-05-29
119	fa fa-circle-o	\N	admin	2017-05-29	admin	2017-05-29
120	fa fa-circle-o-notch	\N	admin	2017-05-29	admin	2017-05-29
121	fa fa-circle-thin	\N	admin	2017-05-29	admin	2017-05-29
122	fa fa-clipboard	\N	admin	2017-05-29	admin	2017-05-29
123	fa fa-clock-o	\N	admin	2017-05-29	admin	2017-05-29
124	fa fa-close	\N	admin	2017-05-29	admin	2017-05-29
125	fa fa-cloud	\N	admin	2017-05-29	admin	2017-05-29
126	fa fa-cloud-download	\N	admin	2017-05-29	admin	2017-05-29
127	fa fa-cloud-upload	\N	admin	2017-05-29	admin	2017-05-29
128	fa fa-cny	\N	admin	2017-05-29	admin	2017-05-29
129	fa fa-code	\N	admin	2017-05-29	admin	2017-05-29
130	fa fa-code-fork	\N	admin	2017-05-29	admin	2017-05-29
131	fa fa-codepen	\N	admin	2017-05-29	admin	2017-05-29
132	fa fa-coffee	\N	admin	2017-05-29	admin	2017-05-29
133	fa fa-cog	\N	admin	2017-05-29	admin	2017-05-29
134	fa fa-cogs	\N	admin	2017-05-29	admin	2017-05-29
135	fa fa-columns	\N	admin	2017-05-29	admin	2017-05-29
136	fa fa-comment	\N	admin	2017-05-29	admin	2017-05-29
137	fa fa-comment-o	\N	admin	2017-05-29	admin	2017-05-29
138	fa fa-comments	\N	admin	2017-05-29	admin	2017-05-29
139	fa fa-comments-o	\N	admin	2017-05-29	admin	2017-05-29
140	fa fa-compass	\N	admin	2017-05-29	admin	2017-05-29
141	fa fa-compress	\N	admin	2017-05-29	admin	2017-05-29
142	fa fa-connectdevelop	\N	admin	2017-05-29	admin	2017-05-29
143	fa fa-copy	\N	admin	2017-05-29	admin	2017-05-29
144	fa fa-copyright	\N	admin	2017-05-29	admin	2017-05-29
145	fa fa-credit-card	\N	admin	2017-05-29	admin	2017-05-29
146	fa fa-crop	\N	admin	2017-05-29	admin	2017-05-29
147	fa fa-crosshairs	\N	admin	2017-05-29	admin	2017-05-29
148	fa fa-css3	\N	admin	2017-05-29	admin	2017-05-29
149	fa fa-cube	\N	admin	2017-05-29	admin	2017-05-29
150	fa fa-cubes	\N	admin	2017-05-29	admin	2017-05-29
151	fa fa-cut	\N	admin	2017-05-29	admin	2017-05-29
152	fa fa-cutlery	\N	admin	2017-05-29	admin	2017-05-29
153	fa fa-dashboard	\N	admin	2017-05-29	admin	2017-05-29
154	fa fa-dashcube	\N	admin	2017-05-29	admin	2017-05-29
155	fa fa-database	\N	admin	2017-05-29	admin	2017-05-29
156	fa fa-dedent	\N	admin	2017-05-29	admin	2017-05-29
157	fa fa-delicious	\N	admin	2017-05-29	admin	2017-05-29
158	fa fa-desktop	\N	admin	2017-05-29	admin	2017-05-29
159	fa fa-deviantart	\N	admin	2017-05-29	admin	2017-05-29
160	fa fa-diamond	\N	admin	2017-05-29	admin	2017-05-29
161	fa fa-digg	\N	admin	2017-05-29	admin	2017-05-29
162	fa fa-dollar	\N	admin	2017-05-29	admin	2017-05-29
163	fa fa-dot-circle-o	\N	admin	2017-05-29	admin	2017-05-29
164	fa fa-download	\N	admin	2017-05-29	admin	2017-05-29
165	fa fa-dribbble	\N	admin	2017-05-29	admin	2017-05-29
166	fa fa-dropbox	\N	admin	2017-05-29	admin	2017-05-29
167	fa fa-drupal	\N	admin	2017-05-29	admin	2017-05-29
168	fa fa-edit	\N	admin	2017-05-29	admin	2017-05-29
169	fa fa-eject	\N	admin	2017-05-29	admin	2017-05-29
170	fa fa-ellipsis-h	\N	admin	2017-05-29	admin	2017-05-29
171	fa fa-ellipsis-v	\N	admin	2017-05-29	admin	2017-05-29
172	fa fa-empire	\N	admin	2017-05-29	admin	2017-05-29
173	fa fa-envelope	\N	admin	2017-05-29	admin	2017-05-29
174	fa fa-envelope-o	\N	admin	2017-05-29	admin	2017-05-29
175	fa fa-envelope-square	\N	admin	2017-05-29	admin	2017-05-29
176	fa fa-eraser	\N	admin	2017-05-29	admin	2017-05-29
177	fa fa-eur	\N	admin	2017-05-29	admin	2017-05-29
178	fa fa-euro	\N	admin	2017-05-29	admin	2017-05-29
179	fa fa-exchange	\N	admin	2017-05-29	admin	2017-05-29
180	fa fa-exclamation	\N	admin	2017-05-29	admin	2017-05-29
181	fa fa-exclamation-circle	\N	admin	2017-05-29	admin	2017-05-29
182	fa fa-exclamation-triangle	\N	admin	2017-05-29	admin	2017-05-29
183	fa fa-expand	\N	admin	2017-05-29	admin	2017-05-29
184	fa fa-external-link	\N	admin	2017-05-29	admin	2017-05-29
185	fa fa-external-link-square	\N	admin	2017-05-29	admin	2017-05-29
186	fa fa-eye	\N	admin	2017-05-29	admin	2017-05-29
187	fa fa-eye-slash	\N	admin	2017-05-29	admin	2017-05-29
188	fa fa-eyedropper	\N	admin	2017-05-29	admin	2017-05-29
189	fa fa-facebook	\N	admin	2017-05-29	admin	2017-05-29
190	fa fa-facebook-f	\N	admin	2017-05-29	admin	2017-05-29
191	fa fa-facebook-official	\N	admin	2017-05-29	admin	2017-05-29
192	fa fa-facebook-square	\N	admin	2017-05-29	admin	2017-05-29
193	fa fa-fast-backward	\N	admin	2017-05-29	admin	2017-05-29
194	fa fa-fast-forward	\N	admin	2017-05-29	admin	2017-05-29
195	fa fa-fax	\N	admin	2017-05-29	admin	2017-05-29
196	fa fa-female	\N	admin	2017-05-29	admin	2017-05-29
197	fa fa-fighter-jet	\N	admin	2017-05-29	admin	2017-05-29
198	fa fa-file	\N	admin	2017-05-29	admin	2017-05-29
199	fa fa-file-archive-o	\N	admin	2017-05-29	admin	2017-05-29
200	fa fa-file-audio-o	\N	admin	2017-05-29	admin	2017-05-29
201	fa fa-file-code-o	\N	admin	2017-05-29	admin	2017-05-29
202	fa fa-file-excel-o	\N	admin	2017-05-29	admin	2017-05-29
203	fa fa-file-image-o	\N	admin	2017-05-29	admin	2017-05-29
204	fa fa-file-movie-o	\N	admin	2017-05-29	admin	2017-05-29
205	fa fa-file-o	\N	admin	2017-05-29	admin	2017-05-29
206	fa fa-file-pdf-o	\N	admin	2017-05-29	admin	2017-05-29
207	fa fa-file-photo-o	\N	admin	2017-05-29	admin	2017-05-29
208	fa fa-file-picture-o	\N	admin	2017-05-29	admin	2017-05-29
209	fa fa-file-powerpoint-o	\N	admin	2017-05-29	admin	2017-05-29
210	fa fa-file-sound-o	\N	admin	2017-05-29	admin	2017-05-29
211	fa fa-file-text	\N	admin	2017-05-29	admin	2017-05-29
212	fa fa-file-text-o	\N	admin	2017-05-29	admin	2017-05-29
213	fa fa-file-video-o	\N	admin	2017-05-29	admin	2017-05-29
214	fa fa-file-word-o	\N	admin	2017-05-29	admin	2017-05-29
215	fa fa-file-zip-o	\N	admin	2017-05-29	admin	2017-05-29
216	fa fa-files-o	\N	admin	2017-05-29	admin	2017-05-29
217	fa fa-film	\N	admin	2017-05-29	admin	2017-05-29
218	fa fa-filter	\N	admin	2017-05-29	admin	2017-05-29
219	fa fa-fire	\N	admin	2017-05-29	admin	2017-05-29
220	fa fa-fire-extinguisher	\N	admin	2017-05-29	admin	2017-05-29
221	fa fa-flag	\N	admin	2017-05-29	admin	2017-05-29
222	fa fa-flag-checkered	\N	admin	2017-05-29	admin	2017-05-29
223	fa fa-flag-o	\N	admin	2017-05-29	admin	2017-05-29
224	fa fa-flash	\N	admin	2017-05-29	admin	2017-05-29
225	fa fa-flask	\N	admin	2017-05-29	admin	2017-05-29
226	fa fa-flickr	\N	admin	2017-05-29	admin	2017-05-29
227	fa fa-floppy-o	\N	admin	2017-05-29	admin	2017-05-29
228	fa fa-folder	\N	admin	2017-05-29	admin	2017-05-29
229	fa fa-folder-o	\N	admin	2017-05-29	admin	2017-05-29
230	fa fa-folder-open	\N	admin	2017-05-29	admin	2017-05-29
231	fa fa-folder-open-o	\N	admin	2017-05-29	admin	2017-05-29
232	fa fa-font	\N	admin	2017-05-29	admin	2017-05-29
233	fa fa-forumbee	\N	admin	2017-05-29	admin	2017-05-29
234	fa fa-forward	\N	admin	2017-05-29	admin	2017-05-29
235	fa fa-foursquare	\N	admin	2017-05-29	admin	2017-05-29
236	fa fa-frown-o	\N	admin	2017-05-29	admin	2017-05-29
237	fa fa-futbol-o	\N	admin	2017-05-29	admin	2017-05-29
238	fa fa-gamepad	\N	admin	2017-05-29	admin	2017-05-29
239	fa fa-gavel	\N	admin	2017-05-29	admin	2017-05-29
240	fa fa-gbp	\N	admin	2017-05-29	admin	2017-05-29
241	fa fa-ge	\N	admin	2017-05-29	admin	2017-05-29
242	fa fa-gear	\N	admin	2017-05-29	admin	2017-05-29
243	fa fa-gears	\N	admin	2017-05-29	admin	2017-05-29
244	fa fa-genderless	\N	admin	2017-05-29	admin	2017-05-29
245	fa fa-gift	\N	admin	2017-05-29	admin	2017-05-29
246	fa fa-git	\N	admin	2017-05-29	admin	2017-05-29
247	fa fa-git-square	\N	admin	2017-05-29	admin	2017-05-29
248	fa fa-github	\N	admin	2017-05-29	admin	2017-05-29
249	fa fa-github-alt	\N	admin	2017-05-29	admin	2017-05-29
250	fa fa-github-square	\N	admin	2017-05-29	admin	2017-05-29
251	fa fa-gittip	\N	admin	2017-05-29	admin	2017-05-29
252	fa fa-glass	\N	admin	2017-05-29	admin	2017-05-29
253	fa fa-globe	\N	admin	2017-05-29	admin	2017-05-29
254	fa fa-google	\N	admin	2017-05-29	admin	2017-05-29
255	fa fa-google-plus	\N	admin	2017-05-29	admin	2017-05-29
256	fa fa-google-plus-square	\N	admin	2017-05-29	admin	2017-05-29
257	fa fa-google-wallet	\N	admin	2017-05-29	admin	2017-05-29
258	fa fa-graduation-cap	\N	admin	2017-05-29	admin	2017-05-29
259	fa fa-gratipay	\N	admin	2017-05-29	admin	2017-05-29
260	fa fa-group	\N	admin	2017-05-29	admin	2017-05-29
261	fa fa-h-square	\N	admin	2017-05-29	admin	2017-05-29
262	fa fa-hacker-news	\N	admin	2017-05-29	admin	2017-05-29
263	fa fa-hand-o-down	\N	admin	2017-05-29	admin	2017-05-29
264	fa fa-hand-o-left	\N	admin	2017-05-29	admin	2017-05-29
265	fa fa-hand-o-right	\N	admin	2017-05-29	admin	2017-05-29
266	fa fa-hand-o-up	\N	admin	2017-05-29	admin	2017-05-29
267	fa fa-hdd-o	\N	admin	2017-05-29	admin	2017-05-29
268	fa fa-header	\N	admin	2017-05-29	admin	2017-05-29
269	fa fa-headphones	\N	admin	2017-05-29	admin	2017-05-29
270	fa fa-heart	\N	admin	2017-05-29	admin	2017-05-29
271	fa fa-heart-o	\N	admin	2017-05-29	admin	2017-05-29
272	fa fa-heartbeat	\N	admin	2017-05-29	admin	2017-05-29
273	fa fa-history	\N	admin	2017-05-29	admin	2017-05-29
274	fa fa-home	\N	admin	2017-05-29	admin	2017-05-29
275	fa fa-hospital-o	\N	admin	2017-05-29	admin	2017-05-29
276	fa fa-hotel	\N	admin	2017-05-29	admin	2017-05-29
277	fa fa-html5	\N	admin	2017-05-29	admin	2017-05-29
278	fa fa-ils	\N	admin	2017-05-29	admin	2017-05-29
279	fa fa-image	\N	admin	2017-05-29	admin	2017-05-29
280	fa fa-inbox	\N	admin	2017-05-29	admin	2017-05-29
281	fa fa-indent	\N	admin	2017-05-29	admin	2017-05-29
282	fa fa-info	\N	admin	2017-05-29	admin	2017-05-29
283	fa fa-info-circle	\N	admin	2017-05-29	admin	2017-05-29
284	fa fa-inr	\N	admin	2017-05-29	admin	2017-05-29
285	fa fa-instagram	\N	admin	2017-05-29	admin	2017-05-29
286	fa fa-institution	\N	admin	2017-05-29	admin	2017-05-29
287	fa fa-ioxhost	\N	admin	2017-05-29	admin	2017-05-29
288	fa fa-italic	\N	admin	2017-05-29	admin	2017-05-29
289	fa fa-joomla	\N	admin	2017-05-29	admin	2017-05-29
290	fa fa-jpy	\N	admin	2017-05-29	admin	2017-05-29
291	fa fa-jsfiddle	\N	admin	2017-05-29	admin	2017-05-29
292	fa fa-key	\N	admin	2017-05-29	admin	2017-05-29
293	fa fa-keyboard-o	\N	admin	2017-05-29	admin	2017-05-29
294	fa fa-krw	\N	admin	2017-05-29	admin	2017-05-29
295	fa fa-language	\N	admin	2017-05-29	admin	2017-05-29
296	fa fa-laptop	\N	admin	2017-05-29	admin	2017-05-29
297	fa fa-lastfm	\N	admin	2017-05-29	admin	2017-05-29
298	fa fa-lastfm-square	\N	admin	2017-05-29	admin	2017-05-29
299	fa fa-leaf	\N	admin	2017-05-29	admin	2017-05-29
300	fa fa-leanpub	\N	admin	2017-05-29	admin	2017-05-29
301	fa fa-legal	\N	admin	2017-05-29	admin	2017-05-29
302	fa fa-lemon-o	\N	admin	2017-05-29	admin	2017-05-29
303	fa fa-level-down	\N	admin	2017-05-29	admin	2017-05-29
304	fa fa-level-up	\N	admin	2017-05-29	admin	2017-05-29
305	fa fa-life-bouy	\N	admin	2017-05-29	admin	2017-05-29
306	fa fa-life-buoy	\N	admin	2017-05-29	admin	2017-05-29
307	fa fa-life-ring	\N	admin	2017-05-29	admin	2017-05-29
308	fa fa-life-saver	\N	admin	2017-05-29	admin	2017-05-29
309	fa fa-lightbulb-o	\N	admin	2017-05-29	admin	2017-05-29
310	fa fa-line-chart	\N	admin	2017-05-29	admin	2017-05-29
311	fa fa-link	\N	admin	2017-05-29	admin	2017-05-29
312	fa fa-linkedin	\N	admin	2017-05-29	admin	2017-05-29
313	fa fa-linkedin-square	\N	admin	2017-05-29	admin	2017-05-29
314	fa fa-linux	\N	admin	2017-05-29	admin	2017-05-29
315	fa fa-list	\N	admin	2017-05-29	admin	2017-05-29
316	fa fa-list-alt	\N	admin	2017-05-29	admin	2017-05-29
317	fa fa-list-ol	\N	admin	2017-05-29	admin	2017-05-29
318	fa fa-list-ul	\N	admin	2017-05-29	admin	2017-05-29
319	fa fa-location-arrow	\N	admin	2017-05-29	admin	2017-05-29
320	fa fa-lock	\N	admin	2017-05-29	admin	2017-05-29
321	fa fa-long-arrow-down	\N	admin	2017-05-29	admin	2017-05-29
322	fa fa-long-arrow-left	\N	admin	2017-05-29	admin	2017-05-29
323	fa fa-long-arrow-right	\N	admin	2017-05-29	admin	2017-05-29
324	fa fa-long-arrow-up	\N	admin	2017-05-29	admin	2017-05-29
325	fa fa-magic	\N	admin	2017-05-29	admin	2017-05-29
326	fa fa-magnet	\N	admin	2017-05-29	admin	2017-05-29
327	fa fa-mail-forward	\N	admin	2017-05-29	admin	2017-05-29
328	fa fa-mail-reply	\N	admin	2017-05-29	admin	2017-05-29
329	fa fa-mail-reply-all	\N	admin	2017-05-29	admin	2017-05-29
330	fa fa-male	\N	admin	2017-05-29	admin	2017-05-29
331	fa fa-map-marker	\N	admin	2017-05-29	admin	2017-05-29
332	fa fa-mars	\N	admin	2017-05-29	admin	2017-05-29
333	fa fa-mars-double	\N	admin	2017-05-29	admin	2017-05-29
334	fa fa-mars-stroke	\N	admin	2017-05-29	admin	2017-05-29
335	fa fa-mars-stroke-h	\N	admin	2017-05-29	admin	2017-05-29
336	fa fa-mars-stroke-v	\N	admin	2017-05-29	admin	2017-05-29
337	fa fa-maxcdn	\N	admin	2017-05-29	admin	2017-05-29
338	fa fa-meanpath	\N	admin	2017-05-29	admin	2017-05-29
339	fa fa-medium	\N	admin	2017-05-29	admin	2017-05-29
340	fa fa-medkit	\N	admin	2017-05-29	admin	2017-05-29
341	fa fa-meh-o	\N	admin	2017-05-29	admin	2017-05-29
342	fa fa-mercury	\N	admin	2017-05-29	admin	2017-05-29
343	fa fa-microphone	\N	admin	2017-05-29	admin	2017-05-29
344	fa fa-microphone-slash	\N	admin	2017-05-29	admin	2017-05-29
345	fa fa-minus	\N	admin	2017-05-29	admin	2017-05-29
346	fa fa-minus-circle	\N	admin	2017-05-29	admin	2017-05-29
347	fa fa-minus-square	\N	admin	2017-05-29	admin	2017-05-29
348	fa fa-minus-square-o	\N	admin	2017-05-29	admin	2017-05-29
349	fa fa-mobile	\N	admin	2017-05-29	admin	2017-05-29
350	fa fa-mobile-phone	\N	admin	2017-05-29	admin	2017-05-29
351	fa fa-money	\N	admin	2017-05-29	admin	2017-05-29
352	fa fa-moon-o	\N	admin	2017-05-29	admin	2017-05-29
353	fa fa-mortar-board	\N	admin	2017-05-29	admin	2017-05-29
354	fa fa-motorcycle	\N	admin	2017-05-29	admin	2017-05-29
355	fa fa-music	\N	admin	2017-05-29	admin	2017-05-29
356	fa fa-navicon	\N	admin	2017-05-29	admin	2017-05-29
357	fa fa-neuter	\N	admin	2017-05-29	admin	2017-05-29
358	fa fa-newspaper-o	\N	admin	2017-05-29	admin	2017-05-29
359	fa fa-openid	\N	admin	2017-05-29	admin	2017-05-29
360	fa fa-outdent	\N	admin	2017-05-29	admin	2017-05-29
361	fa fa-pagelines	\N	admin	2017-05-29	admin	2017-05-29
362	fa fa-paint-brush	\N	admin	2017-05-29	admin	2017-05-29
363	fa fa-paper-plane	\N	admin	2017-05-29	admin	2017-05-29
364	fa fa-paper-plane-o	\N	admin	2017-05-29	admin	2017-05-29
365	fa fa-paperclip	\N	admin	2017-05-29	admin	2017-05-29
366	fa fa-paragraph	\N	admin	2017-05-29	admin	2017-05-29
367	fa fa-paste	\N	admin	2017-05-29	admin	2017-05-29
368	fa fa-pause	\N	admin	2017-05-29	admin	2017-05-29
369	fa fa-paw	\N	admin	2017-05-29	admin	2017-05-29
370	fa fa-paypal	\N	admin	2017-05-29	admin	2017-05-29
371	fa fa-pencil	\N	admin	2017-05-29	admin	2017-05-29
372	fa fa-pencil-square	\N	admin	2017-05-29	admin	2017-05-29
373	fa fa-pencil-square-o	\N	admin	2017-05-29	admin	2017-05-29
374	fa fa-phone	\N	admin	2017-05-29	admin	2017-05-29
375	fa fa-phone-square	\N	admin	2017-05-29	admin	2017-05-29
376	fa fa-photo	\N	admin	2017-05-29	admin	2017-05-29
377	fa fa-picture-o	\N	admin	2017-05-29	admin	2017-05-29
378	fa fa-pie-chart	\N	admin	2017-05-29	admin	2017-05-29
379	fa fa-pied-piper	\N	admin	2017-05-29	admin	2017-05-29
380	fa fa-pied-piper-alt	\N	admin	2017-05-29	admin	2017-05-29
381	fa fa-pinterest	\N	admin	2017-05-29	admin	2017-05-29
382	fa fa-pinterest-p	\N	admin	2017-05-29	admin	2017-05-29
383	fa fa-pinterest-square	\N	admin	2017-05-29	admin	2017-05-29
384	fa fa-plane	\N	admin	2017-05-29	admin	2017-05-29
385	fa fa-play	\N	admin	2017-05-29	admin	2017-05-29
386	fa fa-play-circle	\N	admin	2017-05-29	admin	2017-05-29
387	fa fa-play-circle-o	\N	admin	2017-05-29	admin	2017-05-29
388	fa fa-plug	\N	admin	2017-05-29	admin	2017-05-29
389	fa fa-plus	\N	admin	2017-05-29	admin	2017-05-29
390	fa fa-plus-circle	\N	admin	2017-05-29	admin	2017-05-29
391	fa fa-plus-square	\N	admin	2017-05-29	admin	2017-05-29
392	fa fa-plus-square-o	\N	admin	2017-05-29	admin	2017-05-29
393	fa fa-power-off	\N	admin	2017-05-29	admin	2017-05-29
394	fa fa-print	\N	admin	2017-05-29	admin	2017-05-29
395	fa fa-puzzle-piece	\N	admin	2017-05-29	admin	2017-05-29
396	fa fa-qq	\N	admin	2017-05-29	admin	2017-05-29
397	fa fa-qrcode	\N	admin	2017-05-29	admin	2017-05-29
398	fa fa-question	\N	admin	2017-05-29	admin	2017-05-29
399	fa fa-question-circle	\N	admin	2017-05-29	admin	2017-05-29
400	fa fa-quote-left	\N	admin	2017-05-29	admin	2017-05-29
401	fa fa-quote-right	\N	admin	2017-05-29	admin	2017-05-29
402	fa fa-ra	\N	admin	2017-05-29	admin	2017-05-29
403	fa fa-random	\N	admin	2017-05-29	admin	2017-05-29
404	fa fa-rebel	\N	admin	2017-05-29	admin	2017-05-29
405	fa fa-recycle	\N	admin	2017-05-29	admin	2017-05-29
406	fa fa-reddit	\N	admin	2017-05-29	admin	2017-05-29
407	fa fa-reddit-square	\N	admin	2017-05-29	admin	2017-05-29
408	fa fa-refresh	\N	admin	2017-05-29	admin	2017-05-29
409	fa fa-remove	\N	admin	2017-05-29	admin	2017-05-29
410	fa fa-renren	\N	admin	2017-05-29	admin	2017-05-29
411	fa fa-reorder	\N	admin	2017-05-29	admin	2017-05-29
412	fa fa-repeat	\N	admin	2017-05-29	admin	2017-05-29
413	fa fa-reply	\N	admin	2017-05-29	admin	2017-05-29
414	fa fa-reply-all	\N	admin	2017-05-29	admin	2017-05-29
415	fa fa-retweet	\N	admin	2017-05-29	admin	2017-05-29
416	fa fa-rmb	\N	admin	2017-05-29	admin	2017-05-29
417	fa fa-road	\N	admin	2017-05-29	admin	2017-05-29
418	fa fa-rocket	\N	admin	2017-05-29	admin	2017-05-29
419	fa fa-rotate-left	\N	admin	2017-05-29	admin	2017-05-29
420	fa fa-rotate-right	\N	admin	2017-05-29	admin	2017-05-29
421	fa fa-rouble	\N	admin	2017-05-29	admin	2017-05-29
422	fa fa-rss	\N	admin	2017-05-29	admin	2017-05-29
423	fa fa-rss-square	\N	admin	2017-05-29	admin	2017-05-29
424	fa fa-rub	\N	admin	2017-05-29	admin	2017-05-29
425	fa fa-ruble	\N	admin	2017-05-29	admin	2017-05-29
426	fa fa-rupee	\N	admin	2017-05-29	admin	2017-05-29
427	fa fa-save	\N	admin	2017-05-29	admin	2017-05-29
428	fa fa-scissors	\N	admin	2017-05-29	admin	2017-05-29
429	fa fa-search	\N	admin	2017-05-29	admin	2017-05-29
430	fa fa-search-minus	\N	admin	2017-05-29	admin	2017-05-29
431	fa fa-search-plus	\N	admin	2017-05-29	admin	2017-05-29
432	fa fa-sellsy	\N	admin	2017-05-29	admin	2017-05-29
433	fa fa-send	\N	admin	2017-05-29	admin	2017-05-29
434	fa fa-send-o	\N	admin	2017-05-29	admin	2017-05-29
435	fa fa-server	\N	admin	2017-05-29	admin	2017-05-29
436	fa fa-share	\N	admin	2017-05-29	admin	2017-05-29
437	fa fa-share-alt	\N	admin	2017-05-29	admin	2017-05-29
438	fa fa-share-alt-square	\N	admin	2017-05-29	admin	2017-05-29
439	fa fa-share-square	\N	admin	2017-05-29	admin	2017-05-29
440	fa fa-share-square-o	\N	admin	2017-05-29	admin	2017-05-29
441	fa fa-shekel	\N	admin	2017-05-29	admin	2017-05-29
442	fa fa-sheqel	\N	admin	2017-05-29	admin	2017-05-29
443	fa fa-shield	\N	admin	2017-05-29	admin	2017-05-29
444	fa fa-ship	\N	admin	2017-05-29	admin	2017-05-29
445	fa fa-shirtsinbulk	\N	admin	2017-05-29	admin	2017-05-29
446	fa fa-shopping-cart	\N	admin	2017-05-29	admin	2017-05-29
447	fa fa-sign-in	\N	admin	2017-05-29	admin	2017-05-29
448	fa fa-sign-out	\N	admin	2017-05-29	admin	2017-05-29
449	fa fa-signal	\N	admin	2017-05-29	admin	2017-05-29
450	fa fa-simplybuilt	\N	admin	2017-05-29	admin	2017-05-29
451	fa fa-sitemap	\N	admin	2017-05-29	admin	2017-05-29
452	fa fa-skyatlas	\N	admin	2017-05-29	admin	2017-05-29
453	fa fa-skype	\N	admin	2017-05-29	admin	2017-05-29
454	fa fa-slack	\N	admin	2017-05-29	admin	2017-05-29
455	fa fa-sliders	\N	admin	2017-05-29	admin	2017-05-29
456	fa fa-slideshare	\N	admin	2017-05-29	admin	2017-05-29
457	fa fa-smile-o	\N	admin	2017-05-29	admin	2017-05-29
458	fa fa-soccer-ball-o	\N	admin	2017-05-29	admin	2017-05-29
459	fa fa-sort	\N	admin	2017-05-29	admin	2017-05-29
460	fa fa-sort-alpha-asc	\N	admin	2017-05-29	admin	2017-05-29
461	fa fa-sort-alpha-desc	\N	admin	2017-05-29	admin	2017-05-29
462	fa fa-sort-amount-asc	\N	admin	2017-05-29	admin	2017-05-29
463	fa fa-sort-amount-desc	\N	admin	2017-05-29	admin	2017-05-29
464	fa fa-sort-asc	\N	admin	2017-05-29	admin	2017-05-29
465	fa fa-sort-desc	\N	admin	2017-05-29	admin	2017-05-29
466	fa fa-sort-down	\N	admin	2017-05-29	admin	2017-05-29
467	fa fa-sort-numeric-asc	\N	admin	2017-05-29	admin	2017-05-29
468	fa fa-sort-numeric-desc	\N	admin	2017-05-29	admin	2017-05-29
469	fa fa-sort-up	\N	admin	2017-05-29	admin	2017-05-29
470	fa fa-soundcloud	\N	admin	2017-05-29	admin	2017-05-29
471	fa fa-space-shuttle	\N	admin	2017-05-29	admin	2017-05-29
472	fa fa-spinner	\N	admin	2017-05-29	admin	2017-05-29
473	fa fa-spoon	\N	admin	2017-05-29	admin	2017-05-29
474	fa fa-spotify	\N	admin	2017-05-29	admin	2017-05-29
475	fa fa-square	\N	admin	2017-05-29	admin	2017-05-29
476	fa fa-square-o	\N	admin	2017-05-29	admin	2017-05-29
477	fa fa-stack-exchange	\N	admin	2017-05-29	admin	2017-05-29
478	fa fa-stack-overflow	\N	admin	2017-05-29	admin	2017-05-29
479	fa fa-star	\N	admin	2017-05-29	admin	2017-05-29
480	fa fa-star-half	\N	admin	2017-05-29	admin	2017-05-29
481	fa fa-star-half-empty	\N	admin	2017-05-29	admin	2017-05-29
482	fa fa-star-half-full	\N	admin	2017-05-29	admin	2017-05-29
483	fa fa-star-half-o	\N	admin	2017-05-29	admin	2017-05-29
484	fa fa-star-o	\N	admin	2017-05-29	admin	2017-05-29
485	fa fa-steam	\N	admin	2017-05-29	admin	2017-05-29
486	fa fa-steam-square	\N	admin	2017-05-29	admin	2017-05-29
487	fa fa-step-backward	\N	admin	2017-05-29	admin	2017-05-29
488	fa fa-step-forward	\N	admin	2017-05-29	admin	2017-05-29
489	fa fa-stethoscope	\N	admin	2017-05-29	admin	2017-05-29
490	fa fa-stop	\N	admin	2017-05-29	admin	2017-05-29
491	fa fa-street-view	\N	admin	2017-05-29	admin	2017-05-29
492	fa fa-strikethrough	\N	admin	2017-05-29	admin	2017-05-29
493	fa fa-stumbleupon	\N	admin	2017-05-29	admin	2017-05-29
494	fa fa-stumbleupon-circle	\N	admin	2017-05-29	admin	2017-05-29
495	fa fa-subscript	\N	admin	2017-05-29	admin	2017-05-29
496	fa fa-subway	\N	admin	2017-05-29	admin	2017-05-29
497	fa fa-suitcase	\N	admin	2017-05-29	admin	2017-05-29
498	fa fa-sun-o	\N	admin	2017-05-29	admin	2017-05-29
499	fa fa-superscript	\N	admin	2017-05-29	admin	2017-05-29
500	fa fa-support	\N	admin	2017-05-29	admin	2017-05-29
501	fa fa-table	\N	admin	2017-05-29	admin	2017-05-29
502	fa fa-tablet	\N	admin	2017-05-29	admin	2017-05-29
503	fa fa-tachometer	\N	admin	2017-05-29	admin	2017-05-29
504	fa fa-tag	\N	admin	2017-05-29	admin	2017-05-29
505	fa fa-tags	\N	admin	2017-05-29	admin	2017-05-29
506	fa fa-tasks	\N	admin	2017-05-29	admin	2017-05-29
507	fa fa-taxi	\N	admin	2017-05-29	admin	2017-05-29
508	fa fa-tencent-weibo	\N	admin	2017-05-29	admin	2017-05-29
509	fa fa-terminal	\N	admin	2017-05-29	admin	2017-05-29
510	fa fa-text-height	\N	admin	2017-05-29	admin	2017-05-29
511	fa fa-text-width	\N	admin	2017-05-29	admin	2017-05-29
512	fa fa-th	\N	admin	2017-05-29	admin	2017-05-29
513	fa fa-th-large	\N	admin	2017-05-29	admin	2017-05-29
514	fa fa-th-list	\N	admin	2017-05-29	admin	2017-05-29
515	fa fa-thumb-tack	\N	admin	2017-05-29	admin	2017-05-29
516	fa fa-thumbs-down	\N	admin	2017-05-29	admin	2017-05-29
517	fa fa-thumbs-o-down	\N	admin	2017-05-29	admin	2017-05-29
518	fa fa-thumbs-o-up	\N	admin	2017-05-29	admin	2017-05-29
519	fa fa-thumbs-up	\N	admin	2017-05-29	admin	2017-05-29
520	fa fa-ticket	\N	admin	2017-05-29	admin	2017-05-29
521	fa fa-times	\N	admin	2017-05-29	admin	2017-05-29
522	fa fa-times-circle	\N	admin	2017-05-29	admin	2017-05-29
523	fa fa-times-circle-o	\N	admin	2017-05-29	admin	2017-05-29
524	fa fa-tint	\N	admin	2017-05-29	admin	2017-05-29
525	fa fa-toggle-down	\N	admin	2017-05-29	admin	2017-05-29
526	fa fa-toggle-left	\N	admin	2017-05-29	admin	2017-05-29
527	fa fa-toggle-off	\N	admin	2017-05-29	admin	2017-05-29
528	fa fa-toggle-on	\N	admin	2017-05-29	admin	2017-05-29
529	fa fa-toggle-right	\N	admin	2017-05-29	admin	2017-05-29
530	fa fa-toggle-up	\N	admin	2017-05-29	admin	2017-05-29
531	fa fa-train	\N	admin	2017-05-29	admin	2017-05-29
532	fa fa-transgender	\N	admin	2017-05-29	admin	2017-05-29
533	fa fa-transgender-alt	\N	admin	2017-05-29	admin	2017-05-29
534	fa fa-trash	\N	admin	2017-05-29	admin	2017-05-29
535	fa fa-trash-o	\N	admin	2017-05-29	admin	2017-05-29
536	fa fa-tree	\N	admin	2017-05-29	admin	2017-05-29
537	fa fa-trello	\N	admin	2017-05-29	admin	2017-05-29
538	fa fa-trophy	\N	admin	2017-05-29	admin	2017-05-29
539	fa fa-truck	\N	admin	2017-05-29	admin	2017-05-29
540	fa fa-try	\N	admin	2017-05-29	admin	2017-05-29
541	fa fa-tty	\N	admin	2017-05-29	admin	2017-05-29
542	fa fa-tumblr	\N	admin	2017-05-29	admin	2017-05-29
543	fa fa-tumblr-square	\N	admin	2017-05-29	admin	2017-05-29
544	fa fa-turkish-lira	\N	admin	2017-05-29	admin	2017-05-29
545	fa fa-twitch	\N	admin	2017-05-29	admin	2017-05-29
546	fa fa-twitter	\N	admin	2017-05-29	admin	2017-05-29
547	fa fa-twitter-square	\N	admin	2017-05-29	admin	2017-05-29
548	fa fa-umbrella	\N	admin	2017-05-29	admin	2017-05-29
549	fa fa-underline	\N	admin	2017-05-29	admin	2017-05-29
550	fa fa-undo	\N	admin	2017-05-29	admin	2017-05-29
551	fa fa-university	\N	admin	2017-05-29	admin	2017-05-29
552	fa fa-unlink	\N	admin	2017-05-29	admin	2017-05-29
553	fa fa-unlock	\N	admin	2017-05-29	admin	2017-05-29
554	fa fa-unlock-alt	\N	admin	2017-05-29	admin	2017-05-29
555	fa fa-unsorted	\N	admin	2017-05-29	admin	2017-05-29
556	fa fa-upload	\N	admin	2017-05-29	admin	2017-05-29
557	fa fa-usd	\N	admin	2017-05-29	admin	2017-05-29
558	fa fa-user	\N	admin	2017-05-29	admin	2017-05-29
559	fa fa-user-md	\N	admin	2017-05-29	admin	2017-05-29
560	fa fa-user-plus	\N	admin	2017-05-29	admin	2017-05-29
561	fa fa-user-secret	\N	admin	2017-05-29	admin	2017-05-29
562	fa fa-user-times	\N	admin	2017-05-29	admin	2017-05-29
563	fa fa-users	\N	admin	2017-05-29	admin	2017-05-29
564	fa fa-venus	\N	admin	2017-05-29	admin	2017-05-29
565	fa fa-venus-double	\N	admin	2017-05-29	admin	2017-05-29
566	fa fa-venus-mars	\N	admin	2017-05-29	admin	2017-05-29
567	fa fa-viacoin	\N	admin	2017-05-29	admin	2017-05-29
568	fa fa-video-camera	\N	admin	2017-05-29	admin	2017-05-29
569	fa fa-vimeo-square	\N	admin	2017-05-29	admin	2017-05-29
570	fa fa-vine	\N	admin	2017-05-29	admin	2017-05-29
571	fa fa-vk	\N	admin	2017-05-29	admin	2017-05-29
572	fa fa-volume-down	\N	admin	2017-05-29	admin	2017-05-29
573	fa fa-volume-off	\N	admin	2017-05-29	admin	2017-05-29
574	fa fa-volume-up	\N	admin	2017-05-29	admin	2017-05-29
575	fa fa-warning	\N	admin	2017-05-29	admin	2017-05-29
576	fa fa-wechat	\N	admin	2017-05-29	admin	2017-05-29
577	fa fa-weibo	\N	admin	2017-05-29	admin	2017-05-29
578	fa fa-weixin	\N	admin	2017-05-29	admin	2017-05-29
579	fa fa-whatsapp	\N	admin	2017-05-29	admin	2017-05-29
580	fa fa-wheelchair	\N	admin	2017-05-29	admin	2017-05-29
581	fa fa-wifi	\N	admin	2017-05-29	admin	2017-05-29
582	fa fa-windows	\N	admin	2017-05-29	admin	2017-05-29
583	fa fa-won	\N	admin	2017-05-29	admin	2017-05-29
584	fa fa-wordpress	\N	admin	2017-05-29	admin	2017-05-29
585	fa fa-wrench	\N	admin	2017-05-29	admin	2017-05-29
586	fa fa-xing	\N	admin	2017-05-29	admin	2017-05-29
587	fa fa-xing-square	\N	admin	2017-05-29	admin	2017-05-29
588	fa fa-yahoo	\N	admin	2017-05-29	admin	2017-05-29
589	fa fa-yelp	\N	admin	2017-05-29	admin	2017-05-29
590	fa fa-yen	\N	admin	2017-05-29	admin	2017-05-29
591	fa fa-youtube	\N	admin	2017-05-29	admin	2017-05-29
592	fa fa-youtube-play	\N	admin	2017-05-29	admin	2017-05-29
593	fa fa-youtube-square	\N	admin	2017-05-29	admin	2017-05-29
\.


--
-- Data for Name: logs; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY logs (log_id, log_desc, log_user, created_by, created_date, updated_by, updated_date) FROM stdin;
1	admin view data user - Time : 29-05-2017 15:36:16	admin	admin	2017-05-29	admin	2017-05-29
2	admin view role user - Time : 29-05-2017 15:36:32	admin	admin	2017-05-29	admin	2017-05-29
3	admin view data log - Time : 29-05-2017 15:36:33	admin	admin	2017-05-29	admin	2017-05-29
4	admin view data user - Time : 29-05-2017 15:36:34	admin	admin	2017-05-29	admin	2017-05-29
5	admin view role user - Time : 29-05-2017 15:36:34	admin	admin	2017-05-29	admin	2017-05-29
6	admin view data role - Time : 29-05-2017 15:37:48	admin	admin	2017-05-29	admin	2017-05-29
7	admin view role permission - Time : 29-05-2017 15:37:48	admin	admin	2017-05-29	admin	2017-05-29
\.


--
-- Data for Name: menus; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY menus (menu_id, p_application_id, parent_id, menu_title, menu_url, menu_icon, menu_order, menu_description, created_by, created_date, updated_by, updated_date) FROM stdin;
1	1	\N	p_application	administration.p_application	fa fa-gear	1	\N	admin	2017-05-29	admin	2017-05-29
2	1	\N	Users	administration.users	fa fa-user	2	\N	admin	2017-05-29	admin	2017-05-29
3	2	\N	TEST	administration.test	fa fa-money	1	\N	admin	2017-05-29	admin	2017-05-29
4	1	\N	Roles	administration.roles	fa fa-users	3	\N	admin	2017-05-29	admin	2017-05-29
5	1	\N	Permissions	administration.permissions	fa fa-flag-checkered	4	\N	admin	2017-05-29	admin	2017-05-29
6	1	\N	Icons	administration.icons	fa fa-bullseye	5	\N	admin	2017-05-29	admin	2017-05-29
7	2	3	TEST1	administration.test1	fa fa-asterisk	1	\N	admin	2017-05-29	admin	2017-05-29
8	2	7	TEST2	administration.test	fa fa-ambulance	1	\N	admin	2017-05-29	admin	2017-05-29
9	2	8	TEST3	administration.test3	fa fa-user	1	\N	admin	2017-05-29	admin	2017-05-29
\.


--
-- Data for Name: p_application; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY p_application (p_application_id, code, description, created_by, created_date, updated_by, updated_date, is_active, module_icon) FROM stdin;
1	ADMINISTRATION SYSTEM	\N	admin	2017-05-29	admin	2017-05-29	Y	images/md_01_on.png
2	TRANSACTION	\N	admin	2017-05-29	admin	2017-05-29	Y	images/md_02_on.png
\.


--
-- Data for Name: permission_menu; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY permission_menu (menu_id, permission_id, created_by, created_date, updated_by, updated_date) FROM stdin;
\.


--
-- Data for Name: permission_role; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY permission_role (role_id, permission_id, created_by, created_date, updated_by, updated_date) FROM stdin;
1	1	admin	2017-05-29	admin	2017-05-29
1	2	admin	2017-05-29	admin	2017-05-29
1	3	admin	2017-05-29	admin	2017-05-29
1	4	admin	2017-05-29	admin	2017-05-29
1	5	admin	2017-05-29	admin	2017-05-29
1	6	admin	2017-05-29	admin	2017-05-29
1	7	admin	2017-05-29	admin	2017-05-29
1	8	admin	2017-05-29	admin	2017-05-29
1	9	admin	2017-05-29	admin	2017-05-29
1	10	admin	2017-05-29	admin	2017-05-29
1	11	admin	2017-05-29	admin	2017-05-29
1	12	admin	2017-05-29	admin	2017-05-29
1	13	admin	2017-05-29	admin	2017-05-29
1	14	admin	2017-05-29	admin	2017-05-29
1	15	admin	2017-05-29	admin	2017-05-29
1	16	admin	2017-05-29	admin	2017-05-29
1	17	admin	2017-05-29	admin	2017-05-29
1	18	admin	2017-05-29	admin	2017-05-29
1	19	admin	2017-05-29	admin	2017-05-29
1	20	admin	2017-05-29	admin	2017-05-29
1	21	admin	2017-05-29	admin	2017-05-29
1	22	admin	2017-05-29	admin	2017-05-29
1	23	admin	2017-05-29	admin	2017-05-29
1	24	admin	2017-05-29	admin	2017-05-29
2	1	admin	2017-05-29	admin	2017-05-29
1	25	admin	2017-05-29	admin	2017-05-29
\.


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY permissions (permission_id, permission_name, permission_display_name, permission_description, created_by, created_date, updated_by, updated_date) FROM stdin;
1	can-view-user	\N		admin	2017-05-29	admin	2017-05-29
2	can-add-user	\N		admin	2017-05-29	admin	2017-05-29
3	can-edit-user	\N		admin	2017-05-29	admin	2017-05-29
4	can-delete-user	\N		admin	2017-05-29	admin	2017-05-29
5	can-view-module	\N		admin	2017-05-29	admin	2017-05-29
6	can-add-module	\N		admin	2017-05-29	admin	2017-05-29
7	can-edit-module	\N		admin	2017-05-29	admin	2017-05-29
8	can-delete-module	\N		admin	2017-05-29	admin	2017-05-29
9	can-view-role	\N		admin	2017-05-29	admin	2017-05-29
10	can-add-role	\N		admin	2017-05-29	admin	2017-05-29
11	can-edit-role	\N		admin	2017-05-29	admin	2017-05-29
12	can-delete-role	\N		admin	2017-05-29	admin	2017-05-29
13	can-view-menu	\N		admin	2017-05-29	admin	2017-05-29
14	can-add-menu	\N		admin	2017-05-29	admin	2017-05-29
15	can-edit-menu	\N		admin	2017-05-29	admin	2017-05-29
16	can-delete-menu	\N		admin	2017-05-29	admin	2017-05-29
17	can-view-icon	\N		admin	2017-05-29	admin	2017-05-29
18	can-add-icon	\N		admin	2017-05-29	admin	2017-05-29
19	can-edit-icon	\N		admin	2017-05-29	admin	2017-05-29
20	can-delete-icon	\N		admin	2017-05-29	admin	2017-05-29
21	can-view-permission	\N		admin	2017-05-29	admin	2017-05-29
22	can-add-permission	\N		admin	2017-05-29	admin	2017-05-29
23	can-edit-permission	\N		admin	2017-05-29	admin	2017-05-29
24	can-delete-permission	\N		admin	2017-05-29	admin	2017-05-29
25	can-view-log	\N		admin	2017-05-29	admin	2017-05-29
\.


--
-- Data for Name: role_menu; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY role_menu (role_id, menu_id, created_by, created_date, updated_by, updated_date) FROM stdin;
1	1	admin	2017-05-29	admin	2017-05-29
1	2	admin	2017-05-29	admin	2017-05-29
1	3	admin	2017-05-29	admin	2017-05-29
1	4	admin	2017-05-29	admin	2017-05-29
1	5	admin	2017-05-29	admin	2017-05-29
1	6	admin	2017-05-29	admin	2017-05-29
1	7	admin	2017-05-29	admin	2017-05-29
1	8	admin	2017-05-29	admin	2017-05-29
1	9	admin	2017-05-29	admin	2017-05-29
2	2	admin	2017-05-29	admin	2017-05-29
2	3	admin	2017-05-29	admin	2017-05-29
\.


--
-- Data for Name: p_application_role; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY p_application_role (p_application_id, role_id, created_by, created_date, updated_by, updated_date) FROM stdin;
1	1	admin	2017-05-29	admin	2017-05-29
1	2	admin	2017-05-29	admin	2017-05-29
2	1	admin	2017-05-29	admin	2017-05-29
2	2	admin	2017-05-29	admin	2017-05-29
\.


--
-- Data for Name: role_user; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY role_user (user_id, role_id, created_by, created_date, updated_by, updated_date) FROM stdin;
1	1	admin	2017-05-29	admin	2017-05-29
2	2	admin	2017-05-29	admin	2017-05-29
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY roles (role_id, role_name, role_description, created_by, created_date, updated_by, updated_date, is_active) FROM stdin;
1	ADMINISTRATOR	\N	admin	2017-05-29	admin	2017-05-29	Y
2	OPERATOR	\N	admin	2017-05-29	admin	2017-05-29	Y
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: agripro
--

COPY users (user_id, user_name, user_full_name, user_email, user_password, created_by, created_date, updated_by, updated_date, user_status) FROM stdin;
1	admin	Administrator	admin@gmail.com	5f4dcc3b5aa765d61d8327deb882cf99	admin	2017-05-29	admin	2017-05-29	1
2	operator	Operator	operator@none.com	5f4dcc3b5aa765d61d8327deb882cf99	admin	2017-05-29	admin	2017-05-29	1
\.


--
-- Name: pk_icons; Type: CONSTRAINT; Schema: public; Owner: agripro; Tablespace: 
--

ALTER TABLE ONLY icons
    ADD CONSTRAINT pk_icons PRIMARY KEY (icon_id);


--
-- Name: pk_logs; Type: CONSTRAINT; Schema: public; Owner: agripro; Tablespace: 
--

ALTER TABLE ONLY logs
    ADD CONSTRAINT pk_logs PRIMARY KEY (log_id);


--
-- Name: pk_menus; Type: CONSTRAINT; Schema: public; Owner: agripro; Tablespace: 
--

ALTER TABLE ONLY menus
    ADD CONSTRAINT pk_menus PRIMARY KEY (menu_id);


--
-- Name: pk_p_application; Type: CONSTRAINT; Schema: public; Owner: agripro; Tablespace: 
--

ALTER TABLE ONLY p_application
    ADD CONSTRAINT pk_p_application PRIMARY KEY (p_application_id);


--
-- Name: pk_permissions; Type: CONSTRAINT; Schema: public; Owner: agripro; Tablespace: 
--

ALTER TABLE ONLY permissions
    ADD CONSTRAINT pk_permissions PRIMARY KEY (permission_id);


--
-- Name: pk_roles; Type: CONSTRAINT; Schema: public; Owner: agripro; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT pk_roles PRIMARY KEY (role_id);


--
-- Name: pk_users; Type: CONSTRAINT; Schema: public; Owner: agripro; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk_users PRIMARY KEY (user_id);


--
-- Name: icons_pk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE UNIQUE INDEX icons_pk ON icons USING btree (icon_id);


--
-- Name: logs_pk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE UNIQUE INDEX logs_pk ON logs USING btree (log_id);


--
-- Name: menus_pk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE UNIQUE INDEX menus_pk ON menus USING btree (menu_id);


--
-- Name: p_application_pk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE UNIQUE INDEX p_application_pk ON p_application USING btree (p_application_id);


--
-- Name: permissions_pk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE UNIQUE INDEX permissions_pk ON permissions USING btree (permission_id);


--
-- Name: r10_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r10_fk ON menus USING btree (p_application_id);


--
-- Name: r11_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r11_fk ON role_menu USING btree (role_id);


--
-- Name: r12_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r12_fk ON role_menu USING btree (menu_id);


--
-- Name: r13_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r13_fk ON permission_menu USING btree (permission_id);


--
-- Name: r14_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r14_fk ON permission_menu USING btree (menu_id);


--
-- Name: r1_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r1_fk ON role_user USING btree (user_id);


--
-- Name: r2_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r2_fk ON role_user USING btree (role_id);


--
-- Name: r3_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r3_fk ON menus USING btree (parent_id);


--
-- Name: r6_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r6_fk ON p_application_role USING btree (role_id);


--
-- Name: r7_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r7_fk ON p_application_role USING btree (p_application_id);


--
-- Name: r8_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r8_fk ON permission_role USING btree (role_id);


--
-- Name: r9_fk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE INDEX r9_fk ON permission_role USING btree (permission_id);


--
-- Name: roles_pk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE UNIQUE INDEX roles_pk ON roles USING btree (role_id);


--
-- Name: users_pk; Type: INDEX; Schema: public; Owner: agripro; Tablespace: 
--

CREATE UNIQUE INDEX users_pk ON users USING btree (user_id);


--
-- Name: fk_menus_r10_p_application; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY menus
    ADD CONSTRAINT fk_menus_r10_p_application FOREIGN KEY (p_application_id) REFERENCES p_application(p_application_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_menus_r3_menus; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY menus
    ADD CONSTRAINT fk_menus_r3_menus FOREIGN KEY (parent_id) REFERENCES menus(menu_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_permissi_r13_permissi; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY permission_menu
    ADD CONSTRAINT fk_permissi_r13_permissi FOREIGN KEY (permission_id) REFERENCES permissions(permission_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_permissi_r14_menus; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY permission_menu
    ADD CONSTRAINT fk_permissi_r14_menus FOREIGN KEY (menu_id) REFERENCES menus(menu_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_permissi_r8_roles; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT fk_permissi_r8_roles FOREIGN KEY (role_id) REFERENCES roles(role_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_permissi_r9_permissi; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT fk_permissi_r9_permissi FOREIGN KEY (permission_id) REFERENCES permissions(permission_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_role_men_r11_roles; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY role_menu
    ADD CONSTRAINT fk_role_men_r11_roles FOREIGN KEY (role_id) REFERENCES roles(role_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_role_men_r12_menus; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY role_menu
    ADD CONSTRAINT fk_role_men_r12_menus FOREIGN KEY (menu_id) REFERENCES menus(menu_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_role_mod_r6_roles; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY p_application_role
    ADD CONSTRAINT fk_role_mod_r6_roles FOREIGN KEY (role_id) REFERENCES roles(role_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_role_mod_r7_p_application; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY p_application_role
    ADD CONSTRAINT fk_role_mod_r7_p_application FOREIGN KEY (p_application_id) REFERENCES p_application(p_application_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_role_use_r1_users; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT fk_role_use_r1_users FOREIGN KEY (user_id) REFERENCES users(user_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_role_use_r2_roles; Type: FK CONSTRAINT; Schema: public; Owner: agripro
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT fk_role_use_r2_roles FOREIGN KEY (role_id) REFERENCES roles(role_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

