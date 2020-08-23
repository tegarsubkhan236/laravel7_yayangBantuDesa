--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 9.6.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: _bantuans; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._bantuans (
    id character varying(1) DEFAULT NULL::character varying,
    user_id character varying(1) DEFAULT NULL::character varying,
    penduduk_id character varying(1) DEFAULT NULL::character varying,
    jenisbantuan_id character varying(1) DEFAULT NULL::character varying,
    profil character varying(1) DEFAULT NULL::character varying,
    kk character varying(1) DEFAULT NULL::character varying,
    ktp character varying(1) DEFAULT NULL::character varying,
    status character varying(1) DEFAULT NULL::character varying,
    created_at character varying(1) DEFAULT NULL::character varying,
    updated_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._bantuans OWNER TO rebasedata;

--
-- Name: _failed_jobs; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._failed_jobs (
    id character varying(1) DEFAULT NULL::character varying,
    connection character varying(1) DEFAULT NULL::character varying,
    queue character varying(1) DEFAULT NULL::character varying,
    payload character varying(1) DEFAULT NULL::character varying,
    exception character varying(1) DEFAULT NULL::character varying,
    failed_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._failed_jobs OWNER TO rebasedata;

--
-- Name: _jenis_bantuans; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._jenis_bantuans (
    id character varying(1) DEFAULT NULL::character varying,
    nama character varying(1) DEFAULT NULL::character varying,
    asal_bantuan character varying(1) DEFAULT NULL::character varying,
    bentuk_bantuan character varying(1) DEFAULT NULL::character varying,
    nominal character varying(1) DEFAULT NULL::character varying,
    kuota_tetap character varying(1) DEFAULT NULL::character varying,
    kuota character varying(1) DEFAULT NULL::character varying,
    tempat character varying(1) DEFAULT NULL::character varying,
    tgl_penyuluhan character varying(1) DEFAULT NULL::character varying,
    sasaran_id character varying(1) DEFAULT NULL::character varying,
    created_at character varying(1) DEFAULT NULL::character varying,
    updated_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._jenis_bantuans OWNER TO rebasedata;

--
-- Name: _kuotas; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._kuotas (
    id smallint,
    jenisbantuan_id smallint,
    tersampaikan smallint,
    created_at character varying(19) DEFAULT NULL::character varying,
    updated_at character varying(19) DEFAULT NULL::character varying
);


ALTER TABLE public._kuotas OWNER TO rebasedata;

--
-- Name: _lampirans; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._lampirans (
    id character varying(1) DEFAULT NULL::character varying,
    jenisbantuan_id character varying(1) DEFAULT NULL::character varying,
    foto1 character varying(1) DEFAULT NULL::character varying,
    foto2 character varying(1) DEFAULT NULL::character varying,
    foto3 character varying(1) DEFAULT NULL::character varying,
    foto4 character varying(1) DEFAULT NULL::character varying,
    foto5 character varying(1) DEFAULT NULL::character varying,
    created_at character varying(1) DEFAULT NULL::character varying,
    updated_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._lampirans OWNER TO rebasedata;

--
-- Name: _migrations; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._migrations (
    id smallint,
    migration character varying(46) DEFAULT NULL::character varying,
    batch smallint
);


ALTER TABLE public._migrations OWNER TO rebasedata;

--
-- Name: _password_resets; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._password_resets (
    email character varying(1) DEFAULT NULL::character varying,
    token character varying(1) DEFAULT NULL::character varying,
    created_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._password_resets OWNER TO rebasedata;

--
-- Name: _pekerjaans; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._pekerjaans (
    id smallint,
    pekerjaan character varying(11) DEFAULT NULL::character varying,
    penghasilan integer,
    created_at character varying(19) DEFAULT NULL::character varying,
    updated_at character varying(19) DEFAULT NULL::character varying
);


ALTER TABLE public._pekerjaans OWNER TO rebasedata;

--
-- Name: _penduduks; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._penduduks (
    id smallint,
    nik integer,
    nama character varying(8) DEFAULT NULL::character varying,
    alamat character varying(7) DEFAULT NULL::character varying,
    kk integer,
    no_hp bigint,
    jenis_kelamin character varying(1) DEFAULT NULL::character varying,
    pendidikan character varying(2) DEFAULT NULL::character varying,
    jumlah_keluarga smallint,
    pekerjaan_id smallint,
    created_at character varying(19) DEFAULT NULL::character varying,
    updated_at character varying(19) DEFAULT NULL::character varying
);


ALTER TABLE public._penduduks OWNER TO rebasedata;

--
-- Name: _penyuluhans; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._penyuluhans (
    id character varying(1) DEFAULT NULL::character varying,
    bantuan_id character varying(1) DEFAULT NULL::character varying,
    user_id character varying(1) DEFAULT NULL::character varying,
    jenisbantuan_id character varying(1) DEFAULT NULL::character varying,
    status character varying(1) DEFAULT NULL::character varying,
    created_at character varying(1) DEFAULT NULL::character varying,
    updated_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._penyuluhans OWNER TO rebasedata;

--
-- Name: _sasarans; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._sasarans (
    id character varying(1) DEFAULT NULL::character varying,
    pekerjaan_id character varying(1) DEFAULT NULL::character varying,
    created_at character varying(1) DEFAULT NULL::character varying,
    updated_at character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._sasarans OWNER TO rebasedata;

--
-- Name: _users; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._users (
    id smallint,
    penduduk_id smallint,
    nik integer,
    name character varying(8) DEFAULT NULL::character varying,
    password character varying(60) DEFAULT NULL::character varying,
    remember_token character varying(1) DEFAULT NULL::character varying,
    created_at character varying(19) DEFAULT NULL::character varying,
    updated_at character varying(19) DEFAULT NULL::character varying
);


ALTER TABLE public._users OWNER TO rebasedata;

--
-- Data for Name: _bantuans; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._bantuans (id, user_id, penduduk_id, jenisbantuan_id, profil, kk, ktp, status, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: _failed_jobs; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: _jenis_bantuans; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._jenis_bantuans (id, nama, asal_bantuan, bentuk_bantuan, nominal, kuota_tetap, kuota, tempat, tgl_penyuluhan, sasaran_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: _kuotas; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._kuotas (id, jenisbantuan_id, tersampaikan, created_at, updated_at) FROM stdin;
1	7	23	2020-07-15 10:05:40	2020-07-15 10:15:17
\.


--
-- Data for Name: _lampirans; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._lampirans (id, jenisbantuan_id, foto1, foto2, foto3, foto4, foto5, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: _migrations; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._migrations (id, migration, batch) FROM stdin;
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2020_07_11_191254_create_penduduks_table	1
5	2014_10_12_000000_create_users_table	5
7	2020_07_13_062637_create_jenis_bantuans_table	7
8	2020_07_13_061628_create_bantuans_table	4
10	2020_07_13_105447_create_penyuluhans_table	6
11	2020_07_14_120434_create_sasarans_table	8
14	2020_07_15_143756_create_kuotas_table	9
16	2020_07_26_085813_create_lampirans_table	10
17	2020_07_29_052207_create_pekerjaans_table	11
\.


--
-- Data for Name: _password_resets; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: _pekerjaans; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._pekerjaans (id, pekerjaan, penghasilan, created_at, updated_at) FROM stdin;
1	kuli sejati	80000	2020-07-29 00:35:35	2020-08-15 11:04:41
\.


--
-- Data for Name: _penduduks; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._penduduks (id, nik, nama, alamat, kk, no_hp, jenis_kelamin, pendidikan, jumlah_keluarga, pekerjaan_id, created_at, updated_at) FROM stdin;
6	12345678	admin	bandung	87654321	89666288087	L	S1	1	1		
8	12345	jaenudin	Bandung	8764321	1237654	L	S1	5	1	2020-07-29 01:03:53	2020-07-29 01:03:53
11	12	wqe	weq	12	1231231	L	12	123	1	2020-08-17 06:49:48	2020-08-17 06:49:48
\.


--
-- Data for Name: _penyuluhans; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._penyuluhans (id, bantuan_id, user_id, jenisbantuan_id, status, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: _sasarans; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._sasarans (id, pekerjaan_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: _users; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._users (id, penduduk_id, nik, name, password, remember_token, created_at, updated_at) FROM stdin;
10	6	12345678	admin	$2y$12$jNSxt5dNJkEcbBdoZytiRe8DyGvzigJ5aI3dMxjAV9ed1wlRM64ty			
11	8	12345	jaenudin	$2y$10$yszCKvhx1jP9JhEWKaMazOJrdiLETG/Keyj7dJb7OA577O4IU.of2		2020-07-29 01:04:18	2020-08-15 13:25:29
\.


--
-- PostgreSQL database dump complete
--

