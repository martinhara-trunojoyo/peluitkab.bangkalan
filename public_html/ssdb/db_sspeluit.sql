--
-- PostgreSQL database dump
--

-- Dumped from database version 12.15
-- Dumped by pg_dump version 12.15

-- Started on 2023-11-08 09:51:14

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE sspeluit;
--
-- TOC entry 3138 (class 1262 OID 16393)
-- Name: sspeluit; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE sspeluit WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_Indonesia.1252' LC_CTYPE = 'English_Indonesia.1252';


ALTER DATABASE sspeluit OWNER TO postgres;

\connect sspeluit

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 253 (class 1259 OID 33195)
-- Name: log_aktifitas_magang; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.log_aktifitas_magang (
    id_log integer NOT NULL,
    id_user integer,
    tgl_aktifitas timestamp without time zone,
    aktifitas character varying(255),
    color character varying(50),
    id_tiket integer,
    icon character varying(50)
);


ALTER TABLE public.log_aktifitas_magang OWNER TO postgres;

--
-- TOC entry 252 (class 1259 OID 33193)
-- Name: log_aktifitas_magang_id_log_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.log_aktifitas_magang_id_log_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.log_aktifitas_magang_id_log_seq OWNER TO postgres;

--
-- TOC entry 3139 (class 0 OID 0)
-- Dependencies: 252
-- Name: log_aktifitas_magang_id_log_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.log_aktifitas_magang_id_log_seq OWNED BY public.log_aktifitas_magang.id_log;


--
-- TOC entry 227 (class 1259 OID 24777)
-- Name: log_aktifitas_pelayanan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.log_aktifitas_pelayanan (
    id_log integer NOT NULL,
    id_user integer,
    tgl_aktifitas timestamp without time zone,
    aktifitas character varying(255),
    color character varying(50),
    id_tiket integer,
    icon character varying(50)
);


ALTER TABLE public.log_aktifitas_pelayanan OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 24775)
-- Name: log_aktifitas_pelayanan_id_log _seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."log_aktifitas_pelayanan_id_log _seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."log_aktifitas_pelayanan_id_log _seq" OWNER TO postgres;

--
-- TOC entry 3140 (class 0 OID 0)
-- Dependencies: 226
-- Name: log_aktifitas_pelayanan_id_log _seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."log_aktifitas_pelayanan_id_log _seq" OWNED BY public.log_aktifitas_pelayanan.id_log;


--
-- TOC entry 213 (class 1259 OID 16469)
-- Name: ssalat; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ssalat (
    id_alat integer NOT NULL,
    nama_alat character varying(255),
    nomor_seri character varying(20),
    active integer,
    tgl_input timestamp without time zone,
    merk character varying(255)
);


ALTER TABLE public.ssalat OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 16467)
-- Name: ssalat_id_alat_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ssalat_id_alat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ssalat_id_alat_seq OWNER TO postgres;

--
-- TOC entry 3141 (class 0 OID 0)
-- Dependencies: 212
-- Name: ssalat_id_alat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ssalat_id_alat_seq OWNED BY public.ssalat.id_alat;


--
-- TOC entry 215 (class 1259 OID 16495)
-- Name: ssaula; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ssaula (
    id_aula integer NOT NULL,
    nama_aula character varying(75),
    active integer,
    tgl_input timestamp without time zone
);


ALTER TABLE public.ssaula OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 16493)
-- Name: ssaula_id_aula_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ssaula_id_aula_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ssaula_id_aula_seq OWNER TO postgres;

--
-- TOC entry 3142 (class 0 OID 0)
-- Dependencies: 214
-- Name: ssaula_id_aula_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ssaula_id_aula_seq OWNED BY public.ssaula.id_aula;


--
-- TOC entry 219 (class 1259 OID 16512)
-- Name: ssfaq; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ssfaq (
    id_faq integer NOT NULL,
    id_opd integer,
    pertanyaan character varying(150),
    jawaban character varying(500),
    active integer,
    tgl_input timestamp without time zone
);


ALTER TABLE public.ssfaq OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 16510)
-- Name: ssfaq_id_faq_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ssfaq_id_faq_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ssfaq_id_faq_seq OWNER TO postgres;

--
-- TOC entry 3143 (class 0 OID 0)
-- Dependencies: 218
-- Name: ssfaq_id_faq_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ssfaq_id_faq_seq OWNED BY public.ssfaq.id_faq;


--
-- TOC entry 203 (class 1259 OID 16396)
-- Name: ssopd; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ssopd (
    id_opd integer NOT NULL,
    nama_opd character varying(125),
    akronim_opd character varying(50),
    foto_opd character varying(255)
);


ALTER TABLE public.ssopd OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16394)
-- Name: ssopd_id_opd_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ssopd_id_opd_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ssopd_id_opd_seq OWNER TO postgres;

--
-- TOC entry 3144 (class 0 OID 0)
-- Dependencies: 202
-- Name: ssopd_id_opd_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ssopd_id_opd_seq OWNED BY public.ssopd.id_opd;


--
-- TOC entry 209 (class 1259 OID 16433)
-- Name: ssotp; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ssotp (
    id_otp integer NOT NULL,
    id_ssuser integer,
    kode_otp character(6),
    exp_date timestamp without time zone,
    active integer
);


ALTER TABLE public.ssotp OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16431)
-- Name: ssotp_id_otp_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ssotp_id_otp_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ssotp_id_otp_seq OWNER TO postgres;

--
-- TOC entry 3145 (class 0 OID 0)
-- Dependencies: 208
-- Name: ssotp_id_otp_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ssotp_id_otp_seq OWNED BY public.ssotp.id_otp;


--
-- TOC entry 205 (class 1259 OID 16404)
-- Name: sspelayanan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sspelayanan (
    id_pelayanan integer NOT NULL,
    id_opd integer NOT NULL,
    nama_pelayanan character varying(125),
    route character varying(50),
    url character varying(125),
    file_foto character varying(255),
    active integer,
    tgl_input timestamp without time zone,
    deskripsi character varying(255)
);


ALTER TABLE public.sspelayanan OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16402)
-- Name: sspelayanan_id_pelayanan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sspelayanan_id_pelayanan_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sspelayanan_id_pelayanan_seq OWNER TO postgres;

--
-- TOC entry 3146 (class 0 OID 0)
-- Dependencies: 204
-- Name: sspelayanan_id_pelayanan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sspelayanan_id_pelayanan_seq OWNED BY public.sspelayanan.id_pelayanan;


--
-- TOC entry 207 (class 1259 OID 16420)
-- Name: ssuser; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ssuser (
    id_ssuser integer NOT NULL,
    username character varying(20) NOT NULL,
    nip character varying(20),
    nik character varying(20),
    id_chat bigint,
    active integer,
    role_id integer,
    file_foto character(150),
    id_opd integer,
    tgl_input timestamp without time zone,
    tgl_validasi timestamp without time zone,
    nama character(100)
);


ALTER TABLE public.ssuser OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16418)
-- Name: ssuser_id_ssuser_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ssuser_id_ssuser_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ssuser_id_ssuser_seq OWNER TO postgres;

--
-- TOC entry 3147 (class 0 OID 0)
-- Dependencies: 206
-- Name: ssuser_id_ssuser_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ssuser_id_ssuser_seq OWNED BY public.ssuser.id_ssuser;


--
-- TOC entry 249 (class 1259 OID 33156)
-- Name: ssuser_magang; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ssuser_magang (
    id_ssuser_magang integer NOT NULL,
    id_ssuser integer,
    gender integer,
    wa character varying(15),
    jenis integer,
    nomor_induk character varying(20),
    jurusan character varying(150),
    civitas character varying(150),
    ktp character varying(50)
);


ALTER TABLE public.ssuser_magang OWNER TO postgres;

--
-- TOC entry 248 (class 1259 OID 33154)
-- Name: ssuser_magang_id_ssuser_magang_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ssuser_magang_id_ssuser_magang_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ssuser_magang_id_ssuser_magang_seq OWNER TO postgres;

--
-- TOC entry 3148 (class 0 OID 0)
-- Dependencies: 248
-- Name: ssuser_magang_id_ssuser_magang_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ssuser_magang_id_ssuser_magang_seq OWNED BY public.ssuser_magang.id_ssuser_magang;


--
-- TOC entry 247 (class 1259 OID 33138)
-- Name: ssuser_pembimbing; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ssuser_pembimbing (
    id_ssuser_pembimbing integer NOT NULL,
    id_ssuser integer NOT NULL,
    id_sub integer NOT NULL
);


ALTER TABLE public.ssuser_pembimbing OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 33136)
-- Name: ssuser_pembimbing_id_ssuser_pembimbing_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ssuser_pembimbing_id_ssuser_pembimbing_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ssuser_pembimbing_id_ssuser_pembimbing_seq OWNER TO postgres;

--
-- TOC entry 3149 (class 0 OID 0)
-- Dependencies: 246
-- Name: ssuser_pembimbing_id_ssuser_pembimbing_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ssuser_pembimbing_id_ssuser_pembimbing_seq OWNED BY public.ssuser_pembimbing.id_ssuser_pembimbing;


--
-- TOC entry 217 (class 1259 OID 16503)
-- Name: sub_bagian; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sub_bagian (
    id_sub integer NOT NULL,
    id_opd integer,
    nama_sub character varying(255),
    tgl_input timestamp without time zone,
    active integer
);


ALTER TABLE public.sub_bagian OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 16501)
-- Name: sub_bagian_id_sub_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sub_bagian_id_sub_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sub_bagian_id_sub_seq OWNER TO postgres;

--
-- TOC entry 3150 (class 0 OID 0)
-- Dependencies: 216
-- Name: sub_bagian_id_sub_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sub_bagian_id_sub_seq OWNED BY public.sub_bagian.id_sub;


--
-- TOC entry 221 (class 1259 OID 24661)
-- Name: tb_tiket; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket (
    id_tiket integer NOT NULL,
    kode_tiket character varying(255),
    tgl_input timestamp without time zone,
    id_pelayanan integer,
    id_user integer,
    status integer,
    catatan character varying(255)
);


ALTER TABLE public.tb_tiket OWNER TO postgres;

--
-- TOC entry 243 (class 1259 OID 24920)
-- Name: tb_tiket_alat; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_alat (
    id_pelayanan_alat integer NOT NULL,
    id_tiket integer,
    nama_acara character varying(50),
    tgl_awal timestamp without time zone,
    tgl_akhir timestamp without time zone,
    nama_pic character varying(50),
    no_pic character varying(15),
    berkas_pengantar character varying(50)
);


ALTER TABLE public.tb_tiket_alat OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 24918)
-- Name: tb_tiket_alat_id_pelayanan_alat_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_alat_id_pelayanan_alat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_alat_id_pelayanan_alat_seq OWNER TO postgres;

--
-- TOC entry 3151 (class 0 OID 0)
-- Dependencies: 242
-- Name: tb_tiket_alat_id_pelayanan_alat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_alat_id_pelayanan_alat_seq OWNED BY public.tb_tiket_alat.id_pelayanan_alat;


--
-- TOC entry 245 (class 1259 OID 24933)
-- Name: tb_tiket_alat_list; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_alat_list (
    id_list integer NOT NULL,
    id_alat integer,
    id_pelayanan_alat integer
);


ALTER TABLE public.tb_tiket_alat_list OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 24931)
-- Name: tb_tiket_alat_list_id_list_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_alat_list_id_list_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_alat_list_id_list_seq OWNER TO postgres;

--
-- TOC entry 3152 (class 0 OID 0)
-- Dependencies: 244
-- Name: tb_tiket_alat_list_id_list_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_alat_list_id_list_seq OWNED BY public.tb_tiket_alat_list.id_list;


--
-- TOC entry 235 (class 1259 OID 24860)
-- Name: tb_tiket_app; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_app (
    id_pelayanan_app integer NOT NULL,
    id_tiket integer,
    nama_aplikasi character varying(50),
    deskripsi_aplikasi character varying(100),
    tgl timestamp without time zone,
    tempat character varying(100),
    agenda integer,
    nama_pic character varying(50),
    no_pic character varying(15),
    berkas_pengantar character varying(50)
);


ALTER TABLE public.tb_tiket_app OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 24858)
-- Name: tb_tiket_app_tb_tiket_app_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_app_tb_tiket_app_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_app_tb_tiket_app_seq OWNER TO postgres;

--
-- TOC entry 3153 (class 0 OID 0)
-- Dependencies: 234
-- Name: tb_tiket_app_tb_tiket_app_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_app_tb_tiket_app_seq OWNED BY public.tb_tiket_app.id_pelayanan_app;


--
-- TOC entry 223 (class 1259 OID 24682)
-- Name: tb_tiket_aula; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_aula (
    id_pelayanan_aula integer NOT NULL,
    id_tiket integer,
    nama_acara character varying(50),
    tgl_awal timestamp without time zone,
    id_aula integer,
    nama_pic character varying(50),
    no_pic character varying(15),
    berkas_pengantar character varying(50),
    tgl_akhir timestamp without time zone
);


ALTER TABLE public.tb_tiket_aula OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 24680)
-- Name: tb_tiket_aula_id_pelayanan_aula_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_aula_id_pelayanan_aula_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_aula_id_pelayanan_aula_seq OWNER TO postgres;

--
-- TOC entry 3154 (class 0 OID 0)
-- Dependencies: 222
-- Name: tb_tiket_aula_id_pelayanan_aula_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_aula_id_pelayanan_aula_seq OWNED BY public.tb_tiket_aula.id_pelayanan_aula;


--
-- TOC entry 231 (class 1259 OID 24808)
-- Name: tb_tiket_hosting; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_hosting (
    id_pelayanan_hosting integer NOT NULL,
    id_tiket integer,
    nama_aplikasi character varying(100),
    deskripsi character varying(255),
    spesifikasi character varying(255),
    nama_pic character varying(50),
    no_pic character varying(15),
    berkas_pengantar character varying(50),
    port character varying(20),
    db_access character varying(50),
    server_access character varying(50)
);


ALTER TABLE public.tb_tiket_hosting OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 24806)
-- Name: tb_tiket_hosting_id_pelayanan_hosting_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_hosting_id_pelayanan_hosting_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_hosting_id_pelayanan_hosting_seq OWNER TO postgres;

--
-- TOC entry 3155 (class 0 OID 0)
-- Dependencies: 230
-- Name: tb_tiket_hosting_id_pelayanan_hosting_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_hosting_id_pelayanan_hosting_seq OWNED BY public.tb_tiket_hosting.id_pelayanan_hosting;


--
-- TOC entry 220 (class 1259 OID 24659)
-- Name: tb_tiket_id_tiket_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_id_tiket_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_id_tiket_seq OWNER TO postgres;

--
-- TOC entry 3156 (class 0 OID 0)
-- Dependencies: 220
-- Name: tb_tiket_id_tiket_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_id_tiket_seq OWNED BY public.tb_tiket.id_tiket;


--
-- TOC entry 237 (class 1259 OID 24873)
-- Name: tb_tiket_jaringan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_jaringan (
    id_pelayanan_jaringan integer NOT NULL,
    id_tiket integer,
    tgl_kejadian date,
    keluhan character varying(500),
    nama_pic character varying(50),
    no_pic character varying(15),
    berkas_pengantar character varying(50),
    tindak_lanjut character varying(500)
);


ALTER TABLE public.tb_tiket_jaringan OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 24889)
-- Name: tb_tiket_jaringan_foto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_jaringan_foto (
    id_pelayanan_jaringan_foto integer NOT NULL,
    berkas_foto character varying(100),
    id_pelayanan_jaringan integer
);


ALTER TABLE public.tb_tiket_jaringan_foto OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 24887)
-- Name: tb_tiket_jaringan_foto_id_pelayanan_jaringan_foto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_jaringan_foto_id_pelayanan_jaringan_foto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_jaringan_foto_id_pelayanan_jaringan_foto_seq OWNER TO postgres;

--
-- TOC entry 3157 (class 0 OID 0)
-- Dependencies: 238
-- Name: tb_tiket_jaringan_foto_id_pelayanan_jaringan_foto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_jaringan_foto_id_pelayanan_jaringan_foto_seq OWNED BY public.tb_tiket_jaringan_foto.id_pelayanan_jaringan_foto;


--
-- TOC entry 236 (class 1259 OID 24871)
-- Name: tb_tiket_jaringan_id_pelayanan_jaringan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_jaringan_id_pelayanan_jaringan_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_jaringan_id_pelayanan_jaringan_seq OWNER TO postgres;

--
-- TOC entry 3158 (class 0 OID 0)
-- Dependencies: 236
-- Name: tb_tiket_jaringan_id_pelayanan_jaringan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_jaringan_id_pelayanan_jaringan_seq OWNED BY public.tb_tiket_jaringan.id_pelayanan_jaringan;


--
-- TOC entry 251 (class 1259 OID 33184)
-- Name: tb_tiket_magang; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_magang (
    id_tiket integer NOT NULL,
    kode_tiket character varying(20),
    tgl_input timestamp without time zone,
    status integer,
    catatan character varying(150),
    id_opd integer,
    tgl_awal date,
    tgl_akhir date,
    nama_pembimbing character varying(50),
    no_pembimbing character varying(15),
    surat_pengantar character varying(50),
    id_user integer,
    nama_project character varying(150),
    deskripsi_project character varying(150),
    berkas_project character varying(50),
    tgl_selesai timestamp without time zone,
    id_pembina_lapangan integer
);


ALTER TABLE public.tb_tiket_magang OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 33182)
-- Name: tb_tiket_magang_id_tiket_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_magang_id_tiket_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_magang_id_tiket_seq OWNER TO postgres;

--
-- TOC entry 3159 (class 0 OID 0)
-- Dependencies: 250
-- Name: tb_tiket_magang_id_tiket_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_magang_id_tiket_seq OWNED BY public.tb_tiket_magang.id_tiket;


--
-- TOC entry 255 (class 1259 OID 33232)
-- Name: tb_tiket_magang_nilai; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_magang_nilai (
    id_magang_nilai integer NOT NULL,
    id_tiket integer,
    nilai_performance integer,
    nilai_sikap integer,
    nilai_kerjasama integer,
    nilai_disiplin integer,
    nilai_komunikasi integer,
    nilai_tanggung_jawab integer,
    nilai_teknis integer,
    catatan_nilai character varying(255),
    tgl_input timestamp without time zone
);


ALTER TABLE public.tb_tiket_magang_nilai OWNER TO postgres;

--
-- TOC entry 254 (class 1259 OID 33230)
-- Name: tb_tiket_magang_nilai_id_magang_nilai_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_magang_nilai_id_magang_nilai_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_magang_nilai_id_magang_nilai_seq OWNER TO postgres;

--
-- TOC entry 3160 (class 0 OID 0)
-- Dependencies: 254
-- Name: tb_tiket_magang_nilai_id_magang_nilai_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_magang_nilai_id_magang_nilai_seq OWNED BY public.tb_tiket_magang_nilai.id_magang_nilai;


--
-- TOC entry 225 (class 1259 OID 24746)
-- Name: tb_tiket_subdomain; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_subdomain (
    id_pelayanan_subdomain integer NOT NULL,
    nama_pic character varying(50),
    no_pic character varying(12),
    berkas_pengantar character varying(50),
    nama_subdomain character varying(70),
    ip_publik character varying(25),
    id_tiket integer
);


ALTER TABLE public.tb_tiket_subdomain OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 24744)
-- Name: tb_tiket_subdomain_id_pelayanan_subdomain_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_subdomain_id_pelayanan_subdomain_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_subdomain_id_pelayanan_subdomain_seq OWNER TO postgres;

--
-- TOC entry 3161 (class 0 OID 0)
-- Dependencies: 224
-- Name: tb_tiket_subdomain_id_pelayanan_subdomain_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_subdomain_id_pelayanan_subdomain_seq OWNED BY public.tb_tiket_subdomain.id_pelayanan_subdomain;


--
-- TOC entry 233 (class 1259 OID 24846)
-- Name: tb_tiket_tte; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_tte (
    id_pelayanan_tte integer NOT NULL,
    id_tiket integer,
    nama_pic character varying(50),
    no_pic character varying(15),
    berkas_pengantar character varying(50),
    berkas_ktp character varying(50),
    jenis_layanan integer,
    nama character varying(50),
    jabatan character varying(70),
    nip character varying(20),
    nik character varying(20)
);


ALTER TABLE public.tb_tiket_tte OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 24844)
-- Name: tb_tiket_tte_id_pelayanan_tte_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_tte_id_pelayanan_tte_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_tte_id_pelayanan_tte_seq OWNER TO postgres;

--
-- TOC entry 3162 (class 0 OID 0)
-- Dependencies: 232
-- Name: tb_tiket_tte_id_pelayanan_tte_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_tte_id_pelayanan_tte_seq OWNED BY public.tb_tiket_tte.id_pelayanan_tte;


--
-- TOC entry 229 (class 1259 OID 24795)
-- Name: tb_tiket_upload; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_upload (
    id_pelayanan_upload integer NOT NULL,
    id_tiket integer,
    nama_pic character varying(50),
    no_pic character varying(12),
    berkas_pengantar character varying(50),
    edisi character varying(10),
    jenis_dokumen integer,
    berkas_upload character varying(50)
);


ALTER TABLE public.tb_tiket_upload OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 24793)
-- Name: tb_tiket_upload_id_pelayanan_upload_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_upload_id_pelayanan_upload_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_upload_id_pelayanan_upload_seq OWNER TO postgres;

--
-- TOC entry 3163 (class 0 OID 0)
-- Dependencies: 228
-- Name: tb_tiket_upload_id_pelayanan_upload_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_upload_id_pelayanan_upload_seq OWNED BY public.tb_tiket_upload.id_pelayanan_upload;


--
-- TOC entry 241 (class 1259 OID 24907)
-- Name: tb_tiket_zoom; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tiket_zoom (
    id_pelayanan_zoom integer NOT NULL,
    id_tiket integer,
    nama_acara character varying(150),
    tgl_awal timestamp without time zone,
    tgl_akhir timestamp without time zone,
    nama_pic character varying(50),
    no_pic character varying(15),
    berkas_pengantar character varying(50),
    jenis_zoom integer,
    meeting_id character varying(15),
    passcode character varying(50),
    tempat character varying(50),
    operator integer
);


ALTER TABLE public.tb_tiket_zoom OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 24905)
-- Name: tb_tiket_zoom_id_pelayanan_zoom_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tiket_zoom_id_pelayanan_zoom_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_tiket_zoom_id_pelayanan_zoom_seq OWNER TO postgres;

--
-- TOC entry 3164 (class 0 OID 0)
-- Dependencies: 240
-- Name: tb_tiket_zoom_id_pelayanan_zoom_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tiket_zoom_id_pelayanan_zoom_seq OWNED BY public.tb_tiket_zoom.id_pelayanan_zoom;


--
-- TOC entry 211 (class 1259 OID 16445)
-- Name: verifikator_pelayanan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.verifikator_pelayanan (
    id_vpelayanan integer NOT NULL,
    id_user integer,
    id_pelayanan integer
);


ALTER TABLE public.verifikator_pelayanan OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 16443)
-- Name: verifikator_pelayanan_id_vpelayanan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.verifikator_pelayanan_id_vpelayanan_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.verifikator_pelayanan_id_vpelayanan_seq OWNER TO postgres;

--
-- TOC entry 3165 (class 0 OID 0)
-- Dependencies: 210
-- Name: verifikator_pelayanan_id_vpelayanan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.verifikator_pelayanan_id_vpelayanan_seq OWNED BY public.verifikator_pelayanan.id_vpelayanan;


--
-- TOC entry 2875 (class 2604 OID 33198)
-- Name: log_aktifitas_magang id_log; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.log_aktifitas_magang ALTER COLUMN id_log SET DEFAULT nextval('public.log_aktifitas_magang_id_log_seq'::regclass);


--
-- TOC entry 2862 (class 2604 OID 24780)
-- Name: log_aktifitas_pelayanan id_log; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.log_aktifitas_pelayanan ALTER COLUMN id_log SET DEFAULT nextval('public."log_aktifitas_pelayanan_id_log _seq"'::regclass);


--
-- TOC entry 2855 (class 2604 OID 16472)
-- Name: ssalat id_alat; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssalat ALTER COLUMN id_alat SET DEFAULT nextval('public.ssalat_id_alat_seq'::regclass);


--
-- TOC entry 2856 (class 2604 OID 16498)
-- Name: ssaula id_aula; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssaula ALTER COLUMN id_aula SET DEFAULT nextval('public.ssaula_id_aula_seq'::regclass);


--
-- TOC entry 2858 (class 2604 OID 16515)
-- Name: ssfaq id_faq; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssfaq ALTER COLUMN id_faq SET DEFAULT nextval('public.ssfaq_id_faq_seq'::regclass);


--
-- TOC entry 2850 (class 2604 OID 16399)
-- Name: ssopd id_opd; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssopd ALTER COLUMN id_opd SET DEFAULT nextval('public.ssopd_id_opd_seq'::regclass);


--
-- TOC entry 2853 (class 2604 OID 16436)
-- Name: ssotp id_otp; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssotp ALTER COLUMN id_otp SET DEFAULT nextval('public.ssotp_id_otp_seq'::regclass);


--
-- TOC entry 2851 (class 2604 OID 16407)
-- Name: sspelayanan id_pelayanan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sspelayanan ALTER COLUMN id_pelayanan SET DEFAULT nextval('public.sspelayanan_id_pelayanan_seq'::regclass);


--
-- TOC entry 2852 (class 2604 OID 16423)
-- Name: ssuser id_ssuser; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser ALTER COLUMN id_ssuser SET DEFAULT nextval('public.ssuser_id_ssuser_seq'::regclass);


--
-- TOC entry 2873 (class 2604 OID 33159)
-- Name: ssuser_magang id_ssuser_magang; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser_magang ALTER COLUMN id_ssuser_magang SET DEFAULT nextval('public.ssuser_magang_id_ssuser_magang_seq'::regclass);


--
-- TOC entry 2872 (class 2604 OID 33141)
-- Name: ssuser_pembimbing id_ssuser_pembimbing; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser_pembimbing ALTER COLUMN id_ssuser_pembimbing SET DEFAULT nextval('public.ssuser_pembimbing_id_ssuser_pembimbing_seq'::regclass);


--
-- TOC entry 2857 (class 2604 OID 16506)
-- Name: sub_bagian id_sub; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_bagian ALTER COLUMN id_sub SET DEFAULT nextval('public.sub_bagian_id_sub_seq'::regclass);


--
-- TOC entry 2859 (class 2604 OID 24664)
-- Name: tb_tiket id_tiket; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket ALTER COLUMN id_tiket SET DEFAULT nextval('public.tb_tiket_id_tiket_seq'::regclass);


--
-- TOC entry 2870 (class 2604 OID 24923)
-- Name: tb_tiket_alat id_pelayanan_alat; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_alat ALTER COLUMN id_pelayanan_alat SET DEFAULT nextval('public.tb_tiket_alat_id_pelayanan_alat_seq'::regclass);


--
-- TOC entry 2871 (class 2604 OID 24936)
-- Name: tb_tiket_alat_list id_list; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_alat_list ALTER COLUMN id_list SET DEFAULT nextval('public.tb_tiket_alat_list_id_list_seq'::regclass);


--
-- TOC entry 2866 (class 2604 OID 24863)
-- Name: tb_tiket_app id_pelayanan_app; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_app ALTER COLUMN id_pelayanan_app SET DEFAULT nextval('public.tb_tiket_app_tb_tiket_app_seq'::regclass);


--
-- TOC entry 2860 (class 2604 OID 24685)
-- Name: tb_tiket_aula id_pelayanan_aula; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_aula ALTER COLUMN id_pelayanan_aula SET DEFAULT nextval('public.tb_tiket_aula_id_pelayanan_aula_seq'::regclass);


--
-- TOC entry 2864 (class 2604 OID 24811)
-- Name: tb_tiket_hosting id_pelayanan_hosting; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_hosting ALTER COLUMN id_pelayanan_hosting SET DEFAULT nextval('public.tb_tiket_hosting_id_pelayanan_hosting_seq'::regclass);


--
-- TOC entry 2867 (class 2604 OID 24876)
-- Name: tb_tiket_jaringan id_pelayanan_jaringan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_jaringan ALTER COLUMN id_pelayanan_jaringan SET DEFAULT nextval('public.tb_tiket_jaringan_id_pelayanan_jaringan_seq'::regclass);


--
-- TOC entry 2868 (class 2604 OID 24892)
-- Name: tb_tiket_jaringan_foto id_pelayanan_jaringan_foto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_jaringan_foto ALTER COLUMN id_pelayanan_jaringan_foto SET DEFAULT nextval('public.tb_tiket_jaringan_foto_id_pelayanan_jaringan_foto_seq'::regclass);


--
-- TOC entry 2874 (class 2604 OID 33187)
-- Name: tb_tiket_magang id_tiket; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_magang ALTER COLUMN id_tiket SET DEFAULT nextval('public.tb_tiket_magang_id_tiket_seq'::regclass);


--
-- TOC entry 2876 (class 2604 OID 33235)
-- Name: tb_tiket_magang_nilai id_magang_nilai; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_magang_nilai ALTER COLUMN id_magang_nilai SET DEFAULT nextval('public.tb_tiket_magang_nilai_id_magang_nilai_seq'::regclass);


--
-- TOC entry 2861 (class 2604 OID 24749)
-- Name: tb_tiket_subdomain id_pelayanan_subdomain; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_subdomain ALTER COLUMN id_pelayanan_subdomain SET DEFAULT nextval('public.tb_tiket_subdomain_id_pelayanan_subdomain_seq'::regclass);


--
-- TOC entry 2865 (class 2604 OID 24849)
-- Name: tb_tiket_tte id_pelayanan_tte; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_tte ALTER COLUMN id_pelayanan_tte SET DEFAULT nextval('public.tb_tiket_tte_id_pelayanan_tte_seq'::regclass);


--
-- TOC entry 2863 (class 2604 OID 24798)
-- Name: tb_tiket_upload id_pelayanan_upload; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_upload ALTER COLUMN id_pelayanan_upload SET DEFAULT nextval('public.tb_tiket_upload_id_pelayanan_upload_seq'::regclass);


--
-- TOC entry 2869 (class 2604 OID 24910)
-- Name: tb_tiket_zoom id_pelayanan_zoom; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_zoom ALTER COLUMN id_pelayanan_zoom SET DEFAULT nextval('public.tb_tiket_zoom_id_pelayanan_zoom_seq'::regclass);


--
-- TOC entry 2854 (class 2604 OID 16448)
-- Name: verifikator_pelayanan id_vpelayanan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.verifikator_pelayanan ALTER COLUMN id_vpelayanan SET DEFAULT nextval('public.verifikator_pelayanan_id_vpelayanan_seq'::regclass);


--
-- TOC entry 3130 (class 0 OID 33195)
-- Dependencies: 253
-- Data for Name: log_aktifitas_magang; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (1, 14, '2023-09-06 10:33:06', 'Membuat tiket', 'warning', 3, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (2, 1, '2023-09-12 10:45:54', 'Memperbaharui catatan', 'primary', 3, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (3, 1, '2023-09-12 10:45:54', 'Tiket telah ditolak', 'danger', 3, 'fa fa-times');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (4, 1, '2023-09-12 10:47:41', 'Memperbaharui catatan', 'primary', 3, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (5, 1, '2023-09-12 10:47:41', 'Tiket telah dibatalkan', 'dark', 3, 'fa fa-times');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (6, 1, '2023-09-12 10:52:44', 'Tiket telah diverifikasi, peserta dapat melaksanakan kegiatan magang di instansi tujuan', 'info', 3, 'fas fa-user-clock');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (7, 1, '2023-09-12 11:18:54', 'Memperbaharui Form Tugas dan Pembimbing Lapangan', 'primary', 3, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (8, 1, '2023-09-12 13:56:13', 'Memperbaharui Form Tugas dan Pembimbing Lapangan', 'primary', 3, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (9, 1, '2023-09-12 14:05:59', 'Tugas dan Pembimbing Lapangan telah ditentukan', 'info', 3, 'fas fa-user-shield');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (10, 1, '2023-09-13 12:35:58', 'Memperbaharui Form Penilaian', 'primary', 3, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (11, 1, '2023-09-13 12:50:54', 'Form Penilaian telah diisi oleh Pembimbing Lapangan, peserta dapat mengakses nilai dan sertifikat magang', 'info', 3, 'fas fa-user-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (12, 1, '2023-09-13 12:50:54', 'Tiket telah diselesaikan', 'success', 3, 'fa fa-check');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (13, 1, '2023-09-22 09:10:20', 'Membuat tiket', 'warning', 4, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (14, 1, '2023-09-22 09:13:52', 'Tiket telah diverifikasi, peserta dapat melaksanakan kegiatan magang di instansi tujuan', 'info', 4, 'fas fa-user-clock');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (15, 1, '2023-09-22 09:14:12', 'Memperbaharui Form Tugas dan Pembimbing Lapangan', 'primary', 4, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (16, 1, '2023-09-22 09:14:34', 'Tugas dan Pembimbing Lapangan telah ditentukan', 'info', 4, 'fas fa-user-shield');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (17, 1, '2023-09-22 09:16:53', 'Memperbaharui Form Penilaian', 'primary', 4, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (18, 1, '2023-09-22 09:17:20', 'Form Penilaian telah diisi oleh Pembimbing Lapangan, peserta dapat mengakses nilai dan sertifikat magang', 'info', 4, 'fas fa-user-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (19, 1, '2023-09-22 09:17:20', 'Tiket telah diselesaikan', 'success', 4, 'fa fa-check');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (20, 3, '2023-10-27 10:35:34', 'Memperbaharui catatan', 'primary', 3, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (21, 3, '2023-10-27 10:35:34', 'Tiket telah ditolak', 'danger', 3, 'fa fa-times');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (22, 3, '2023-10-27 10:37:17', 'Tiket telah diverifikasi, peserta dapat melaksanakan kegiatan magang di instansi tujuan', 'info', 3, 'fas fa-user-clock');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (23, 3, '2023-10-30 11:20:13', 'Tiket telah diverifikasi, peserta dapat melaksanakan kegiatan magang di instansi tujuan', 'info', 4, 'fas fa-user-clock');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (24, 3, '2023-10-30 11:20:39', 'Memperbaharui Form Tugas dan Pembimbing Lapangan', 'primary', 4, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (25, 3, '2023-10-30 11:20:44', 'Tugas dan Pembimbing Lapangan telah ditentukan', 'info', 4, 'fas fa-user-shield');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (26, 9, '2023-10-30 15:30:34', 'Memperbaharui Form Penilaian', 'primary', 4, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (27, 9, '2023-10-30 15:30:38', 'Form Penilaian telah diisi oleh Pembimbing Lapangan, peserta dapat mengakses nilai dan sertifikat magang', 'info', 4, 'fas fa-user-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (28, 9, '2023-10-30 15:30:38', 'Tiket telah diselesaikan', 'success', 4, 'fa fa-check');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (29, 14, '2023-10-30 15:31:18', 'Membuat tiket', 'warning', 5, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (30, 14, '2023-10-31 12:23:12', 'Membuat tiket', 'warning', 6, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (31, 1, '2023-10-31 12:56:31', 'Tiket telah diverifikasi, peserta dapat melaksanakan kegiatan magang di instansi tujuan', 'info', 4, 'fas fa-user-clock');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (32, 1, '2023-10-31 12:57:48', 'Memperbaharui Form Tugas dan Pembimbing Lapangan', 'primary', 4, 'far fa-edit');
INSERT INTO public.log_aktifitas_magang (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (33, 1, '2023-10-31 12:57:52', 'Tugas dan Pembimbing Lapangan telah ditentukan', 'info', 4, 'fas fa-user-shield');


--
-- TOC entry 3104 (class 0 OID 24777)
-- Dependencies: 227
-- Data for Name: log_aktifitas_pelayanan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (2, 1, '2023-08-09 12:10:55', 'Membuat tiket', 'warning', 10, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (3, 1, '2023-08-09 14:23:42', 'Membuat tiket', 'warning', 11, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (4, 1, '2023-08-10 11:10:19', 'Membuat tiket', 'warning', 13, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (5, 1, '2023-08-10 12:35:30', 'Membuat tiket', 'warning', 14, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (6, 1, '2023-08-10 13:55:19', 'Membuat tiket', 'warning', 15, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (11, 1, '2023-08-11 11:21:46', 'Membuat tiket', 'warning', 34, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (12, 1, '2023-08-11 11:22:25', 'Membuat tiket', 'warning', 35, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (13, 1, '2023-08-11 11:23:47', 'Membuat tiket', 'warning', 37, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (14, 1, '2023-08-11 11:26:51', 'Membuat tiket', 'warning', 38, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (15, 1, '2023-08-11 11:27:03', 'Membuat tiket', 'warning', 39, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (16, 1, '2023-08-15 13:41:18', 'Membuat tiket', 'warning', 40, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (17, 1, '2023-08-15 13:41:18', 'Membuat tiket', 'warning', 41, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (18, 1, '2023-08-15 13:41:18', 'Membuat tiket', 'warning', 42, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (19, 1, '2023-08-23 11:23:37', 'Update Catatan', 'primary', 42, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (20, 1, '2023-08-23 11:43:44', 'Update Catatan', 'primary', 42, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (21, 1, '2023-08-23 13:56:27', 'Tiket telah disetujui', 'success', 42, 'fa fa-check');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (22, 1, '2023-08-24 09:58:28', 'Memperbaharui Meeting Id dan/atau Passcode', 'primary', 40, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (23, 1, '2023-08-24 10:02:19', 'Memperbaharui catatan', 'primary', 40, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (24, 1, '2023-08-24 10:02:19', 'Tiket telah dibatalkan', 'dark', 40, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (25, 1, '2023-08-24 10:18:35', 'Memperbaharui catatan', 'primary', 41, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (26, 1, '2023-08-24 10:18:35', 'Tiket telah ditolak', 'danger', 41, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (27, 1, '2023-08-24 11:05:57', 'Memperbaharui isian tindak lanjut', 'primary', 39, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (28, 1, '2023-08-24 11:19:02', 'Tiket telah disetujui', 'success', 39, 'fa fa-check');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (29, 1, '2023-08-24 11:20:07', 'Memperbaharui catatan', 'primary', 38, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (30, 1, '2023-08-24 11:20:07', 'Tiket telah ditolak', 'danger', 38, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (31, 1, '2023-08-24 11:20:14', 'Memperbaharui catatan', 'primary', 37, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (32, 1, '2023-08-24 11:20:14', 'Tiket telah dibatalkan', 'dark', 37, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (33, 1, '2023-08-24 11:42:43', 'Memperbaharui catatan', 'primary', 36, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (34, 1, '2023-08-24 11:42:43', 'Tiket telah ditolak', 'danger', 36, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (35, 1, '2023-08-24 11:42:55', 'Memperbaharui catatan', 'primary', 35, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (36, 1, '2023-08-24 11:42:55', 'Tiket telah dibatalkan', 'dark', 35, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (37, 1, '2023-08-24 11:43:50', 'Memperbaharui catatan', 'primary', 34, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (38, 1, '2023-08-24 11:43:50', 'Tiket telah dibatalkan', 'dark', 34, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (45, 1, '2023-08-24 12:30:49', 'Tiket telah disetujui', 'success', 15, 'fa fa-check');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (46, 1, '2023-08-24 12:49:52', 'Memperbaharui catatan', 'primary', 14, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (47, 1, '2023-08-24 12:49:52', 'Tiket telah ditolak', 'danger', 14, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (48, 1, '2023-09-01 10:47:20', 'Memperbaharui SSH dan/atau DB Akses', 'primary', 13, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (49, 1, '2023-09-01 10:49:45', 'Memperbaharui SSH dan/atau DB Akses', 'primary', 13, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (50, 1, '2023-09-01 10:49:55', 'Tiket telah disetujui', 'success', 13, 'fa fa-check');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (53, 1, '2023-09-01 11:24:10', 'Memperbaharui catatan', 'primary', 11, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (54, 1, '2023-09-01 11:24:10', 'Tiket telah ditolak', 'danger', 11, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (55, 1, '2023-09-01 11:27:23', 'Memperbaharui catatan', 'primary', 11, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (56, 1, '2023-09-01 11:27:23', 'Tiket telah ditolak', 'danger', 11, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (57, 1, '2023-09-01 11:39:54', 'Tiket telah disetujui', 'success', 10, 'fa fa-check');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (59, 5, '2023-10-30 10:18:09', 'Memperbaharui catatan', 'primary', 41, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (60, 5, '2023-10-30 10:18:09', 'Tiket telah ditolak', 'danger', 41, 'fa fa-times');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (61, 3, '2023-10-31 15:22:23', 'Membuat tiket', 'warning', 43, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (62, 3, '2023-10-31 15:27:03', 'Membuat tiket', 'warning', 44, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (63, 3, '2023-10-31 15:31:22', 'Membuat tiket', 'warning', 45, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (64, 3, '2023-11-01 11:18:08', 'Membuat tiket', 'warning', 46, 'fas fa-ticket-alt');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (65, 1, '2023-11-01 11:37:16', 'Tiket telah disetujui', 'success', 46, 'fa fa-check');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (66, 1, '2023-11-01 11:44:03', 'Memperbaharui catatan', 'primary', 45, 'far fa-edit');
INSERT INTO public.log_aktifitas_pelayanan (id_log, id_user, tgl_aktifitas, aktifitas, color, id_tiket, icon) VALUES (67, 1, '2023-11-01 11:44:03', 'Tiket telah ditolak', 'danger', 45, 'fa fa-times');


--
-- TOC entry 3090 (class 0 OID 16469)
-- Dependencies: 213
-- Data for Name: ssalat; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ssalat (id_alat, nama_alat, nomor_seri, active, tgl_input, merk) VALUES (2, 'Laptop', '253256', 1, '2023-07-18 10:24:09', 'Acer');


--
-- TOC entry 3092 (class 0 OID 16495)
-- Dependencies: 215
-- Data for Name: ssaula; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ssaula (id_aula, nama_aula, active, tgl_input) VALUES (3, 'Command Center', 1, '2023-07-18 13:13:43');


--
-- TOC entry 3096 (class 0 OID 16512)
-- Dependencies: 219
-- Data for Name: ssfaq; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ssfaq (id_faq, id_opd, pertanyaan, jawaban, active, tgl_input) VALUES (1, 1, 'Kenapa saya tidak mendapat kode otp saat membuat akun PELUIT ?', 'Pertama, pastikan id chat telegram anda benar. Apabila id chat anda berubah, silahkan hubungi help desk untuk mengganti id chat telegram anda.', 1, '2023-07-27 12:42:12');
INSERT INTO public.ssfaq (id_faq, id_opd, pertanyaan, jawaban, active, tgl_input) VALUES (2, 1, 'Bagaimana mendapatkan ID Chat ?', 'Silahkan cari Kode Otp kemudian klik tombol start', 1, '2023-07-31 09:44:29');


--
-- TOC entry 3080 (class 0 OID 16396)
-- Dependencies: 203
-- Data for Name: ssopd; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (1, 'Dinas Komunikasi dan Informatika', 'DISKOMINFO', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (2, 'Dinas Pendidikan', 'DISDIK', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (3, 'Dinas Kesehatan', 'DINKES', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (4, 'Dinas Pekerjaan Umum dan Penataan Ruang', 'PUPR', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (5, 'Dinas Perumahan Rakyat dan Kawasan Permukiman', 'PRKP', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (6, 'Dinas Sosial', 'DINSOS', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (7, 'Dinas Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 'DKBP3A', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (8, 'Dinas Ketahanan Pangan', 'Dinas Ketahanan Pang', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (9, 'Dinas Lingkungan Hidup', 'DLH', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (10, 'Dinas Kependudukan dan Pencatatan Sipil', 'DISPENDUKCAPIL', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (11, 'Dinas Pemberdayaan Masyarakat dan Desa', 'DPMD', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (12, 'Dinas Perhubungan', 'DISHUB', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (13, 'Dinas Koperasi dan Usaha Mikro', 'DINKOP', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (14, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'DPMPTSP', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (15, 'Dinas Pemuda dan Olahraga', 'DISPORA', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (16, 'Dinas Kebudayaan dan Pariwisata', 'DISBUDPAR', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (17, 'Dinas Perpustakaan dan Kearsipan', 'DISPUSIP', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (18, 'Dinas Perikanan', 'Dinas Perikanan', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (19, 'Dinas Pertanian Tanaman Pangan, Holtikutura dan Perkebunan', 'DISPERTAPAHORBUN', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (20, 'Dinas Peternakan', 'Dinas Peternakan', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (21, 'Dinas Perdagangan', 'DISDAG', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (22, 'Dinas Perindustrian dan Tenaga Kerja', 'DISPERINAKER', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (23, 'Badan Perencanaan Pembangunan Daerah', 'BAPPEDA', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (24, 'Badan Kepegawaian dan Pengembangan Sumber Daya Aparatur', 'BKPSDA', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (25, 'Badan Penelitian dan Pengembangan Daerah', 'BALITBANGDA', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (26, 'Badan Pengelola Keuangan dan Aset Daerah', 'BPKAD', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (27, 'Badan Pendapatan Daerah', 'BAPENDA', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (28, 'Badan Kesatuan Bangsa dan Politik', 'BAKESBANGPOL', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (29, 'Badan Penanggulangan Bencana Daerah', 'BPBD', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (30, 'Sekretariat Daerah', 'SEKDA', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (31, 'Inspektorat', 'Inspektorat', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (32, 'Satuan Polisi Pamong Praja', 'SATPOL PP', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (33, 'Rumah Sakit Umum Daerah Syarifah Ambami Rato Ebuh', 'RSUD', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (34, 'Sekretariat Dewan Perwakilan Rakyat Daerah', 'DPRD', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (35, 'Kecamatan Bangkalan', 'Kecamatan Bangkalan', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (36, 'Kelurahan Mlajah', 'Kelurahan Mlajah', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (37, 'Kelurahan Kemayoran', 'Kelurahan Kemayoran', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (38, 'Kelurahan Pangeranan', 'Kelurahan Pangeranan', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (39, 'Kelurahan Demangan', 'Kelurahan Demangan', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (40, 'Kelurahan Kraton', 'Kelurahan Kraton', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (41, 'Kelurahan Pejagan', 'Kelurahan Pejagan', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (42, 'Kelurahan Bancaran', 'Kelurahan Bancaran', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (43, 'Kecamatan Socah', 'Kecamatan Socah', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (44, 'Kecamatan Burneh', 'Kecamatan Burneh', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (45, 'Kecamatan Kamal', 'Kecamatan Kamal', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (46, 'Kecamatan  Arosbaya', 'Kecamatan  Arosbaya', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (47, 'Kecamatan Geger', 'Kecamatan Geger', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (48, 'Kecamatan Klampis', 'Kecamatan Klampis', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (49, 'Kecamatan Sepulu', 'Kecamatan Sepulu', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (50, 'Kecamatan Tanjung Bumi', 'Kecamatan Tanjung Bu', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (51, 'Kecamatan Kokop', 'Kecamatan Kokop', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (52, 'Kecamatan Kwanyar', 'Kecamatan Kwanyar', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (53, 'Kecamatan Labang', 'Kecamatan Labang', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (54, 'Kecamatan Tanahmerah', 'Kecamatan Tanahmerah', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (55, 'Kecamatan Tragah', 'Kecamatan Tragah', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (56, 'Kecamatan Blega', 'Kecamatan Blega', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (57, 'Kecamatan Modung', 'Kecamatan Modung', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (58, 'Kecamatan Konang', 'Kecamatan Konang', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (59, 'Kecamatan Galis', 'Kecamatan Galis', 'logokominfo.png');
INSERT INTO public.ssopd (id_opd, nama_opd, akronim_opd, foto_opd) VALUES (60, 'Kelurahan Tunjung', 'Kelurahan Tunjung', 'logokominfo.png');


--
-- TOC entry 3086 (class 0 OID 16433)
-- Dependencies: 209
-- Data for Name: ssotp; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (43, 1, 'TZ67CP', '2023-09-05 09:09:15', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (44, 1, '9OLBR8', '2023-09-05 13:57:56', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (45, 1, 'JIVKZ8', '2023-09-06 09:16:11', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (46, 1, '7850EC', '2023-09-07 09:19:17', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (47, 1, 'MAAKA6', '2023-09-12 09:24:36', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (48, 1, 'ZTRBXL', '2023-09-13 10:57:08', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (49, 1, 'BAS6AQ', '2023-09-22 09:12:19', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (50, 1, 'TBELMD', '2023-09-25 09:16:39', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (51, 1, 'FP2JFK', '2023-10-24 09:04:53', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (52, 1, 'R55V2I', '2023-10-24 13:26:47', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (53, 1, 'CX8Q0T', '2023-10-25 09:05:20', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (54, 1, '34BCWK', '2023-10-25 10:59:10', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (55, 3, '6TH5YI', '2023-10-26 11:31:41', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (56, 1, 'BBKBLF', '2023-10-26 11:42:49', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (57, 3, '0B7IOD', '2023-10-26 12:46:58', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (58, 3, 'EX8O1B', '2023-10-27 09:38:41', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (59, 1, 'TI6HS0', '2023-10-27 09:39:53', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (60, 5, 'NE45JN', '2023-10-27 13:29:51', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (61, 5, 'LJNPD7', '2023-10-30 09:01:09', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (62, 3, 'LOZ6P8', '2023-10-30 09:31:32', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (63, 9, 'NBGQ4P', '2023-10-30 10:26:28', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (64, 14, 'M4S20N', '2023-10-30 11:40:24', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (68, 9, 'OY13XN', '2023-10-30 15:32:20', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (67, 1, 'HO810I', '2023-10-31 11:22:57', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (69, 14, 'TXFTD4', '2023-10-31 12:24:59', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (66, 5, 'PLEIOS', '2023-10-31 15:01:36', 0);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (65, 3, 'LMF0M8', '2023-10-31 15:18:58', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (70, 3, 'K1P408', '2023-11-01 11:19:58', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (71, 1, 'FWQXS4', '2023-11-01 11:39:47', 1);
INSERT INTO public.ssotp (id_otp, id_ssuser, kode_otp, exp_date, active) VALUES (72, 1, 'N7CGDA', '2023-11-03 13:03:11', 1);


--
-- TOC entry 3082 (class 0 OID 16404)
-- Dependencies: 205
-- Data for Name: sspelayanan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (6, 1, 'Pinjam Aula', 'aula', 'ruang', 'logokominfo.png', 1, '2023-06-15 10:47:34.617498', 'Pelayanan Publik Peminjaman Aula di DISKOMINFO Bangkalan');
INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (5, 1, 'Subdomain', 'sub-domain', 'hosting', 'logokominfo.png', 1, '2023-06-15 09:31:00.173646', 'Pelayanan Publik Permohonan Subdomain Bangkalankab');
INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (4, 1, 'Zoom Meeting', 'zoom', 'zoom', 'logokominfo.png', 1, '2023-06-15 09:30:27.76702', 'Pelayanan publik mengenai pelaksaan zoom meeting baik berupa participant atau host.');
INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (8, 1, 'Hosting', 'hosting', 'hosting', 'logokominfo.png', 1, '2023-06-15 09:30:27.76702', 'Pelayanan Publik Permohonan Hosting Aplikasi di server DISKOMINFO');
INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (9, 1, 'Sertifikat TTE', 'sertifikat-tte', 'tte', 'logokominfo.png', 1, '2023-06-15 09:30:27.76702', 'Pelayanan Publik Pembuatan Sertifikat TTE untuk ASN di Kabupaten Bangkalan');
INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (10, 1, 'Pendampingan Aplikasi', 'pendampingan-aplikasi', 'app', 'logokominfo.png', 1, '2023-06-15 09:30:27.76702', 'Pelayanan Publik Permohonan Pendampingan Pembuatan Aplikasi');
INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (11, 1, 'Pengaduan Jaringan', 'pengaduan-jaringan', 'jaringan', 'logokominfo.png', 1, '2023-06-15 09:30:27.76702', 'Pelayanan Publik Pengajuan Jaringan yang di fasilitasi DISKOMINFO');
INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (13, 1, 'Peralatan Zoom', 'pelaratan-zoom', 'alat', 'logokominfo.png', 1, '2023-08-11 13:48:05', 'Pelayanan Publik Permohonan Peminjaman Peralatan Zoom di DISKOMINFO Bangkalan');
INSERT INTO public.sspelayanan (id_pelayanan, id_opd, nama_pelayanan, route, url, file_foto, active, tgl_input, deskripsi) VALUES (7, 1, 'Upload Dokumen', 'upload-document', 'berkas', 'logokominfo.png', 1, '2023-06-15 09:30:27.76702', 'Pelayanan Publik Permohonan Upload SAKIP atau LAKIP di website Bangkalankab');


--
-- TOC entry 3084 (class 0 OID 16420)
-- Dependencies: 207
-- Data for Name: ssuser; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ssuser (id_ssuser, username, nip, nik, id_chat, active, role_id, file_foto, id_opd, tgl_input, tgl_validasi, nama) VALUES (9, '123456789874563212', '123456789874563212', NULL, 6155320137, 1, 3, 'default.png                                                                                                                                           ', 1, '2023-09-04 13:36:16', NULL, 'Anna Medika                                                                                         ');
INSERT INTO public.ssuser (id_ssuser, username, nip, nik, id_chat, active, role_id, file_foto, id_opd, tgl_input, tgl_validasi, nama) VALUES (1, 'ainur.inas', NULL, NULL, 6155320137, 1, 0, 'default.png                                                                                                                                           ', 1, NULL, NULL, 'Ainur Inas Annisa                                                                                   ');
INSERT INTO public.ssuser (id_ssuser, username, nip, nik, id_chat, active, role_id, file_foto, id_opd, tgl_input, tgl_validasi, nama) VALUES (14, '150411100016', NULL, '3526015212960002', 6155320137, 1, 4, 'aab3238922bcc25a6f606eb525ffdc56.jpg                                                                                                                  ', NULL, '2023-09-05 09:02:04', NULL, 'AINUR INAS ANNISA                                                                                   ');
INSERT INTO public.ssuser (id_ssuser, username, nip, nik, id_chat, active, role_id, file_foto, id_opd, tgl_input, tgl_validasi, nama) VALUES (5, 'romi', NULL, NULL, 6155320137, 1, 2, 'e4da3b7fbbce2345d7772b0674a318d5.png                                                                                                                  ', 1, NULL, NULL, 'ROMI HARIYADI                                                                                       ');
INSERT INTO public.ssuser (id_ssuser, username, nip, nik, id_chat, active, role_id, file_foto, id_opd, tgl_input, tgl_validasi, nama) VALUES (6, '198412232005011002', '198412232005011002', NULL, 1441368710, 1, 0, 'default.png                                                                                                                                           ', NULL, NULL, NULL, 'Satria Andrias Pradana                                                                              ');
INSERT INTO public.ssuser (id_ssuser, username, nip, nik, id_chat, active, role_id, file_foto, id_opd, tgl_input, tgl_validasi, nama) VALUES (3, '132351135521231212', '132351135521231212', NULL, 6155320137, 1, 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3.png                                                                                                                  ', 1, NULL, NULL, 'Admin Kominfo                                                                                       ');
INSERT INTO public.ssuser (id_ssuser, username, nip, nik, id_chat, active, role_id, file_foto, id_opd, tgl_input, tgl_validasi, nama) VALUES (16, '12659874123659', NULL, '3526032204930001', 6155320137, 3, 4, 'c74d97b01eae257e44aa9d5bade97baf.jpg                                                                                                                  ', NULL, '2023-10-31 09:50:35', NULL, 'Marlena                                                                                             ');


--
-- TOC entry 3126 (class 0 OID 33156)
-- Dependencies: 249
-- Data for Name: ssuser_magang; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ssuser_magang (id_ssuser_magang, id_ssuser, gender, wa, jenis, nomor_induk, jurusan, civitas, ktp) VALUES (1, 14, 0, '082331521923', 1, '150411100016', 'TEKNIK INFORMATIKA', 'UNIVERSITAS TRUNOJOYO MADURA', 'aab3238922bcc25a6f606eb525ffdc56.jpg');
INSERT INTO public.ssuser_magang (id_ssuser_magang, id_ssuser, gender, wa, jenis, nomor_induk, jurusan, civitas, ktp) VALUES (3, 16, 0, '025986326985', 0, '12659874123659', 'RPL', 'SMKN 02 BANGKALN', 'c74d97b01eae257e44aa9d5bade97baf.jpeg');


--
-- TOC entry 3124 (class 0 OID 33138)
-- Dependencies: 247
-- Data for Name: ssuser_pembimbing; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ssuser_pembimbing (id_ssuser_pembimbing, id_ssuser, id_sub) VALUES (1, 9, 1);


--
-- TOC entry 3094 (class 0 OID 16503)
-- Dependencies: 217
-- Data for Name: sub_bagian; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.sub_bagian (id_sub, id_opd, nama_sub, tgl_input, active) VALUES (2, 1, 'Informasi dan Komunikasi Publik', '2023-07-26 11:23:11', 1);
INSERT INTO public.sub_bagian (id_sub, id_opd, nama_sub, tgl_input, active) VALUES (3, 1, 'Sekretariat', '2023-07-26 11:23:26', 1);
INSERT INTO public.sub_bagian (id_sub, id_opd, nama_sub, tgl_input, active) VALUES (1, 1, 'Aplikasi Informatika', '2023-07-26 10:57:30', 1);
INSERT INTO public.sub_bagian (id_sub, id_opd, nama_sub, tgl_input, active) VALUES (5, 1, 'Sumber Daya TIK dan Statistik', '2023-10-26 14:22:21', 1);


--
-- TOC entry 3098 (class 0 OID 24661)
-- Dependencies: 221
-- Data for Name: tb_tiket; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (40, 'HWJ7UGY3GPAS4VDV', '2023-10-15 13:41:18', 4, 1, 3, 'Aula digunakan internal kominfo, silahkan bersurat kembali untuk mengganti lokasi zoom');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (39, 'LVRHS12CSUVOF6SP', '2023-10-11 11:27:03', 11, 1, 1, NULL);
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (11, '68aVP91v', '2023-10-09 14:23:42', 7, 1, 2, 'hahaha');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (10, 'ojGfmFvp', '2023-10-09 12:10:55', 5, 1, 1, NULL);
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (13, '88ZBKMX4W5BY1HWG', '2023-08-10 11:10:19', 8, 3, 0, NULL);
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (41, '3T38EW9IOTIMA3ZM', '2023-08-15 13:41:18', 6, 1, 2, 'hahahihi');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (43, 'HB5B18CGRA3KUXH3', '2023-10-31 15:22:23', 11, 3, 0, NULL);
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (44, '9ULHJ9Q0P3SKBSWB', '2023-10-31 15:27:03', 11, 3, 0, NULL);
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (46, 'OSO2L79H3SFAA5H3', '2023-11-01 11:18:08', 7, 3, 1, NULL);
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (45, 'NPD9LW5AP67L0NCL', '2023-10-31 15:31:22', 11, 3, 2, 'apa ya');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (42, 'MULYRWLKWI2W0FOD', '2023-08-15 13:41:18', 13, 1, 1, 'testing ya bestie');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (38, 'FJA9LUIYKG22S72P', '2023-08-11 11:26:51', 11, 1, 2, 'Duplikasi tiket');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (37, '8WMKGSKQABKVJ6BV', '2023-08-11 11:23:47', 11, 1, 3, 'Duplikasi tiket');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (36, '9Y5P3B16WFDUGN1Q', '2023-08-11 11:23:31', 11, 1, 2, 'Duplikat tiket');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (35, '3517RDQE6J2L97M5', '2023-08-11 11:22:25', 11, 1, 3, 'Duplikat tiket');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (34, '0YXDT6WWW6PE0S6J', '2023-08-11 11:21:46', 11, 1, 3, 'Duplikat tiket');
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (15, 'DU1LG8U30RJ572E9', '2023-08-10 13:55:19', 10, 1, 1, NULL);
INSERT INTO public.tb_tiket (id_tiket, kode_tiket, tgl_input, id_pelayanan, id_user, status, catatan) VALUES (14, '8S31JQG9U4W9HBPL', '2023-08-10 12:35:30', 9, 1, 2, 'NIP salah, silahkan membuat tiket baru dengan NIP yang benar');


--
-- TOC entry 3120 (class 0 OID 24920)
-- Dependencies: 243
-- Data for Name: tb_tiket_alat; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_alat (id_pelayanan_alat, id_tiket, nama_acara, tgl_awal, tgl_akhir, nama_pic, no_pic, berkas_pengantar) VALUES (1, 42, 'Testing', '2023-08-15 13:45:00', '2023-08-15 19:41:00', 'asdf', '3123132', 'd645920e395fedad7bbbed0eca3fe2e0.pdf');


--
-- TOC entry 3122 (class 0 OID 24933)
-- Dependencies: 245
-- Data for Name: tb_tiket_alat_list; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_alat_list (id_list, id_alat, id_pelayanan_alat) VALUES (1, 2, 42);


--
-- TOC entry 3112 (class 0 OID 24860)
-- Dependencies: 235
-- Data for Name: tb_tiket_app; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_app (id_pelayanan_app, id_tiket, nama_aplikasi, deskripsi_aplikasi, tgl, tempat, agenda, nama_pic, no_pic, berkas_pengantar) VALUES (1, 15, 'ted', 'asd', '2023-08-10 13:00:00', 'sdfasdf', 0, 'test', '1231231', '9bf31c7ff062936a96d3c8bd1f8f2ff3.pdf');


--
-- TOC entry 3100 (class 0 OID 24682)
-- Dependencies: 223
-- Data for Name: tb_tiket_aula; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_aula (id_pelayanan_aula, id_tiket, nama_acara, tgl_awal, id_aula, nama_pic, no_pic, berkas_pengantar, tgl_akhir) VALUES (10, 41, 'Testing', '2023-08-15 13:45:00', 3, 'asdf', '3123132', 'd645920e395fedad7bbbed0eca3fe2e0.pdf', '2023-08-15 19:41:00');


--
-- TOC entry 3108 (class 0 OID 24808)
-- Dependencies: 231
-- Data for Name: tb_tiket_hosting; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_hosting (id_pelayanan_hosting, id_tiket, nama_aplikasi, deskripsi, spesifikasi, nama_pic, no_pic, berkas_pengantar, port, db_access, server_access) VALUES (1, 13, 'test', 'sdfsdf', 'sfsdf', 'asdasd', 'sdfsdfsdf', 'c51ce410c124a10e0db5e4b97fc2af39.pdf', NULL, NULL, NULL);


--
-- TOC entry 3114 (class 0 OID 24873)
-- Dependencies: 237
-- Data for Name: tb_tiket_jaringan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (19, 34, '2023-08-11', 'asddsf', 'asdfdsf', '123123', 'e369853df766fa44e1ed0ff613f563bd.pdf', NULL);
INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (20, 35, '2023-08-11', 'asddsf', 'asdfdsf', '123123', '1c383cd30b7c298ab50293adfecb7b18.pdf', NULL);
INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (21, 36, '2023-08-11', 'asddsf', 'asdfdsf', '123123', '19ca14e7ea6328a42e0eb13d585e4c22.pdf', NULL);
INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (22, 37, '2023-08-11', 'asddsf', 'asdfdsf', '123123', 'a5bfc9e07964f8dddeb95fc584cd965d.pdf', NULL);
INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (23, 38, '2023-08-11', 'asddsf', 'asdfdsf', '123123', 'a5771bce93e200c36f7cd9dfd0e5deaa.pdf', NULL);
INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (24, 39, '2023-08-11', 'asddsf', 'asdfdsf', '123123', 'd67d8ab4f4c10bf22aa353e27879133c.pdf', 'coba
');
INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (25, 43, '2023-10-31', 'Jaringan Lemot', 'Ainur Inas Annisa', '023659875623', '17e62166fc8586dfa4d1bc0e1742c08b.pdf', NULL);
INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (26, 44, '2023-10-28', 'Jaringan Lemot', 'Ainur Inas', '025369789654', 'f7177163c833dff4b38fc8d2872f1ec6.pdf', NULL);
INSERT INTO public.tb_tiket_jaringan (id_pelayanan_jaringan, id_tiket, tgl_kejadian, keluhan, nama_pic, no_pic, berkas_pengantar, tindak_lanjut) VALUES (27, 45, '2023-10-28', 'Lemot', 'Ainur Inas', '023654785236', '6c8349cc7260ae62e3b1396831a8398f.pdf', NULL);


--
-- TOC entry 3116 (class 0 OID 24889)
-- Dependencies: 239
-- Data for Name: tb_tiket_jaringan_foto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_jaringan_foto (id_pelayanan_jaringan_foto, berkas_foto, id_pelayanan_jaringan) VALUES (2, '37693cfc748049e45d87b8c7d8b9aacd_dokumentasi_0.jpeg', 23);
INSERT INTO public.tb_tiket_jaringan_foto (id_pelayanan_jaringan_foto, berkas_foto, id_pelayanan_jaringan) VALUES (3, '37693cfc748049e45d87b8c7d8b9aacd_dokumentasi_1.jpg', 23);
INSERT INTO public.tb_tiket_jaringan_foto (id_pelayanan_jaringan_foto, berkas_foto, id_pelayanan_jaringan) VALUES (4, '1ff1de774005f8da13f42943881c655f_dokumentasi_0.jpeg', 24);
INSERT INTO public.tb_tiket_jaringan_foto (id_pelayanan_jaringan_foto, berkas_foto, id_pelayanan_jaringan) VALUES (5, '1ff1de774005f8da13f42943881c655f_dokumentasi_1.jpg', 24);
INSERT INTO public.tb_tiket_jaringan_foto (id_pelayanan_jaringan_foto, berkas_foto, id_pelayanan_jaringan) VALUES (6, '8e296a067a37563370ded05f5a3bf3ec_dokumentasi_0.jpg', 25);
INSERT INTO public.tb_tiket_jaringan_foto (id_pelayanan_jaringan_foto, berkas_foto, id_pelayanan_jaringan) VALUES (7, '4e732ced3463d06de0ca9a15b6153677_dokumentasi_0.jpg', 26);
INSERT INTO public.tb_tiket_jaringan_foto (id_pelayanan_jaringan_foto, berkas_foto, id_pelayanan_jaringan) VALUES (8, '02e74f10e0327ad868d138f2b4fdd6f0_dokumentasi_0.jpg', 27);


--
-- TOC entry 3128 (class 0 OID 33184)
-- Dependencies: 251
-- Data for Name: tb_tiket_magang; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_magang (id_tiket, kode_tiket, tgl_input, status, catatan, id_opd, tgl_awal, tgl_akhir, nama_pembimbing, no_pembimbing, surat_pengantar, id_user, nama_project, deskripsi_project, berkas_project, tgl_selesai, id_pembina_lapangan) VALUES (3, 'VK56CRPUUF46IUQE', '2023-09-06 10:33:06', 1, NULL, 1, '2023-09-06', '2023-09-16', 'AINUR INAS ANNISA', '02356985232', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.pdf', 14, 'test', NULL, NULL, NULL, 9);
INSERT INTO public.tb_tiket_magang (id_tiket, kode_tiket, tgl_input, status, catatan, id_opd, tgl_awal, tgl_akhir, nama_pembimbing, no_pembimbing, surat_pengantar, id_user, nama_project, deskripsi_project, berkas_project, tgl_selesai, id_pembina_lapangan) VALUES (6, 'X0282O8UHPRRALST', '2023-10-31 12:23:12', 3, NULL, 1, '2023-11-01', '2023-11-30', 'Zulaikha', '023698542369', '1679091c5a880faf6fb5e6087eb1b2dc.pdf', 14, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.tb_tiket_magang (id_tiket, kode_tiket, tgl_input, status, catatan, id_opd, tgl_awal, tgl_akhir, nama_pembimbing, no_pembimbing, surat_pengantar, id_user, nama_project, deskripsi_project, berkas_project, tgl_selesai, id_pembina_lapangan) VALUES (5, '3K3YIOQ7NTI5AWM6', '2023-10-30 15:31:18', 3, NULL, 1, '2023-10-30', '2023-11-30', 'ROMI HARIYADI', '028356985124', 'e4da3b7fbbce2345d7772b0674a318d5.pdf', 14, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.tb_tiket_magang (id_tiket, kode_tiket, tgl_input, status, catatan, id_opd, tgl_awal, tgl_akhir, nama_pembimbing, no_pembimbing, surat_pengantar, id_user, nama_project, deskripsi_project, berkas_project, tgl_selesai, id_pembina_lapangan) VALUES (4, 'TVB9OMZ9WF7UCFZL', '2023-09-22 09:10:20', 5, NULL, 1, '2023-09-22', '2023-09-30', 'AINUR INAS ANNISA', '023253326859', 'a87ff679a2f3e71d9181a67b7542122c.pdf', 14, 'GASD', NULL, NULL, NULL, 9);


--
-- TOC entry 3132 (class 0 OID 33232)
-- Dependencies: 255
-- Data for Name: tb_tiket_magang_nilai; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_magang_nilai (id_magang_nilai, id_tiket, nilai_performance, nilai_sikap, nilai_kerjasama, nilai_disiplin, nilai_komunikasi, nilai_tanggung_jawab, nilai_teknis, catatan_nilai, tgl_input) VALUES (1, 3, 50, 68, 78, 86, 57, 78, 57, '', '2023-09-13 12:35:58');
INSERT INTO public.tb_tiket_magang_nilai (id_magang_nilai, id_tiket, nilai_performance, nilai_sikap, nilai_kerjasama, nilai_disiplin, nilai_komunikasi, nilai_tanggung_jawab, nilai_teknis, catatan_nilai, tgl_input) VALUES (2, 4, 98, 67, 97, 67, 88, 78, 67, '', '2023-09-22 09:16:53');


--
-- TOC entry 3102 (class 0 OID 24746)
-- Dependencies: 225
-- Data for Name: tb_tiket_subdomain; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_subdomain (id_pelayanan_subdomain, nama_pic, no_pic, berkas_pengantar, nama_subdomain, ip_publik, id_tiket) VALUES (1, 'asdsad', 'asdasd', 'd3d9446802a44259755d38e6d163e820.pdf', 'test.bangkalankab.go.id', '1322.6995.2545.2132', 10);


--
-- TOC entry 3110 (class 0 OID 24846)
-- Dependencies: 233
-- Data for Name: tb_tiket_tte; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_tte (id_pelayanan_tte, id_tiket, nama_pic, no_pic, berkas_pengantar, berkas_ktp, jenis_layanan, nama, jabatan, nip, nik) VALUES (1, 14, 'asdsd', '234234', 'aab3238922bcc25a6f606eb525ffdc56.jpg', 'aab3238922bcc25a6f606eb525ffdc56.jpg', 0, 'test', 'trad', '2312313', '123123');


--
-- TOC entry 3106 (class 0 OID 24795)
-- Dependencies: 229
-- Data for Name: tb_tiket_upload; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_upload (id_pelayanan_upload, id_tiket, nama_pic, no_pic, berkas_pengantar, edisi, jenis_dokumen, berkas_upload) VALUES (1, 11, 'test', '0223561', '6512bd43d9caa6e02c990b0a82652dca.pdf', '2023', 0, '6512bd43d9caa6e02c990b0a82652dca.pdf');
INSERT INTO public.tb_tiket_upload (id_pelayanan_upload, id_tiket, nama_pic, no_pic, berkas_pengantar, edisi, jenis_dokumen, berkas_upload) VALUES (2, 46, 'Sakera', '02369854632', 'd9d4f495e875a2e075a1a4a6e1b9770f.pdf', '2022', 0, 'd9d4f495e875a2e075a1a4a6e1b9770f.pdf');


--
-- TOC entry 3118 (class 0 OID 24907)
-- Dependencies: 241
-- Data for Name: tb_tiket_zoom; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_tiket_zoom (id_pelayanan_zoom, id_tiket, nama_acara, tgl_awal, tgl_akhir, nama_pic, no_pic, berkas_pengantar, jenis_zoom, meeting_id, passcode, tempat, operator) VALUES (1, 40, 'Testing', '2023-08-15 13:45:00', '2023-08-15 19:41:00', 'asdf', '3123132', 'd645920e395fedad7bbbed0eca3fe2e0.pdf', 0, '', '', 'Command Center', 0);


--
-- TOC entry 3088 (class 0 OID 16445)
-- Dependencies: 211
-- Data for Name: verifikator_pelayanan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.verifikator_pelayanan (id_vpelayanan, id_user, id_pelayanan) VALUES (15, 5, 6);
INSERT INTO public.verifikator_pelayanan (id_vpelayanan, id_user, id_pelayanan) VALUES (16, 5, 4);
INSERT INTO public.verifikator_pelayanan (id_vpelayanan, id_user, id_pelayanan) VALUES (18, 5, 13);


--
-- TOC entry 3166 (class 0 OID 0)
-- Dependencies: 252
-- Name: log_aktifitas_magang_id_log_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.log_aktifitas_magang_id_log_seq', 33, true);


--
-- TOC entry 3167 (class 0 OID 0)
-- Dependencies: 226
-- Name: log_aktifitas_pelayanan_id_log _seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."log_aktifitas_pelayanan_id_log _seq"', 67, true);


--
-- TOC entry 3168 (class 0 OID 0)
-- Dependencies: 212
-- Name: ssalat_id_alat_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ssalat_id_alat_seq', 2, true);


--
-- TOC entry 3169 (class 0 OID 0)
-- Dependencies: 214
-- Name: ssaula_id_aula_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ssaula_id_aula_seq', 4, true);


--
-- TOC entry 3170 (class 0 OID 0)
-- Dependencies: 218
-- Name: ssfaq_id_faq_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ssfaq_id_faq_seq', 2, true);


--
-- TOC entry 3171 (class 0 OID 0)
-- Dependencies: 202
-- Name: ssopd_id_opd_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ssopd_id_opd_seq', 60, true);


--
-- TOC entry 3172 (class 0 OID 0)
-- Dependencies: 208
-- Name: ssotp_id_otp_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ssotp_id_otp_seq', 72, true);


--
-- TOC entry 3173 (class 0 OID 0)
-- Dependencies: 204
-- Name: sspelayanan_id_pelayanan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sspelayanan_id_pelayanan_seq', 13, true);


--
-- TOC entry 3174 (class 0 OID 0)
-- Dependencies: 206
-- Name: ssuser_id_ssuser_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ssuser_id_ssuser_seq', 16, true);


--
-- TOC entry 3175 (class 0 OID 0)
-- Dependencies: 248
-- Name: ssuser_magang_id_ssuser_magang_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ssuser_magang_id_ssuser_magang_seq', 3, true);


--
-- TOC entry 3176 (class 0 OID 0)
-- Dependencies: 246
-- Name: ssuser_pembimbing_id_ssuser_pembimbing_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ssuser_pembimbing_id_ssuser_pembimbing_seq', 2, true);


--
-- TOC entry 3177 (class 0 OID 0)
-- Dependencies: 216
-- Name: sub_bagian_id_sub_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sub_bagian_id_sub_seq', 5, true);


--
-- TOC entry 3178 (class 0 OID 0)
-- Dependencies: 242
-- Name: tb_tiket_alat_id_pelayanan_alat_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_alat_id_pelayanan_alat_seq', 1, true);


--
-- TOC entry 3179 (class 0 OID 0)
-- Dependencies: 244
-- Name: tb_tiket_alat_list_id_list_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_alat_list_id_list_seq', 1, true);


--
-- TOC entry 3180 (class 0 OID 0)
-- Dependencies: 234
-- Name: tb_tiket_app_tb_tiket_app_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_app_tb_tiket_app_seq', 1, true);


--
-- TOC entry 3181 (class 0 OID 0)
-- Dependencies: 222
-- Name: tb_tiket_aula_id_pelayanan_aula_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_aula_id_pelayanan_aula_seq', 10, true);


--
-- TOC entry 3182 (class 0 OID 0)
-- Dependencies: 230
-- Name: tb_tiket_hosting_id_pelayanan_hosting_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_hosting_id_pelayanan_hosting_seq', 1, true);


--
-- TOC entry 3183 (class 0 OID 0)
-- Dependencies: 220
-- Name: tb_tiket_id_tiket_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_id_tiket_seq', 46, true);


--
-- TOC entry 3184 (class 0 OID 0)
-- Dependencies: 238
-- Name: tb_tiket_jaringan_foto_id_pelayanan_jaringan_foto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_jaringan_foto_id_pelayanan_jaringan_foto_seq', 8, true);


--
-- TOC entry 3185 (class 0 OID 0)
-- Dependencies: 236
-- Name: tb_tiket_jaringan_id_pelayanan_jaringan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_jaringan_id_pelayanan_jaringan_seq', 27, true);


--
-- TOC entry 3186 (class 0 OID 0)
-- Dependencies: 250
-- Name: tb_tiket_magang_id_tiket_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_magang_id_tiket_seq', 6, true);


--
-- TOC entry 3187 (class 0 OID 0)
-- Dependencies: 254
-- Name: tb_tiket_magang_nilai_id_magang_nilai_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_magang_nilai_id_magang_nilai_seq', 2, true);


--
-- TOC entry 3188 (class 0 OID 0)
-- Dependencies: 224
-- Name: tb_tiket_subdomain_id_pelayanan_subdomain_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_subdomain_id_pelayanan_subdomain_seq', 1, true);


--
-- TOC entry 3189 (class 0 OID 0)
-- Dependencies: 232
-- Name: tb_tiket_tte_id_pelayanan_tte_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_tte_id_pelayanan_tte_seq', 1, true);


--
-- TOC entry 3190 (class 0 OID 0)
-- Dependencies: 228
-- Name: tb_tiket_upload_id_pelayanan_upload_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_upload_id_pelayanan_upload_seq', 2, true);


--
-- TOC entry 3191 (class 0 OID 0)
-- Dependencies: 240
-- Name: tb_tiket_zoom_id_pelayanan_zoom_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tiket_zoom_id_pelayanan_zoom_seq', 1, true);


--
-- TOC entry 3192 (class 0 OID 0)
-- Dependencies: 210
-- Name: verifikator_pelayanan_id_vpelayanan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.verifikator_pelayanan_id_vpelayanan_seq', 18, true);


--
-- TOC entry 2928 (class 2606 OID 33200)
-- Name: log_aktifitas_magang log_aktifitas_magang_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.log_aktifitas_magang
    ADD CONSTRAINT log_aktifitas_magang_pkey PRIMARY KEY (id_log);


--
-- TOC entry 2902 (class 2606 OID 24782)
-- Name: log_aktifitas_pelayanan log_aktifitas_pelayanan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.log_aktifitas_pelayanan
    ADD CONSTRAINT log_aktifitas_pelayanan_pkey PRIMARY KEY (id_log);


--
-- TOC entry 2888 (class 2606 OID 16474)
-- Name: ssalat ssalat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssalat
    ADD CONSTRAINT ssalat_pkey PRIMARY KEY (id_alat);


--
-- TOC entry 2890 (class 2606 OID 16500)
-- Name: ssaula ssaula_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssaula
    ADD CONSTRAINT ssaula_pkey PRIMARY KEY (id_aula);


--
-- TOC entry 2894 (class 2606 OID 16520)
-- Name: ssfaq ssfaq_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssfaq
    ADD CONSTRAINT ssfaq_pkey PRIMARY KEY (id_faq);


--
-- TOC entry 2878 (class 2606 OID 16401)
-- Name: ssopd ssopd_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssopd
    ADD CONSTRAINT ssopd_pkey PRIMARY KEY (id_opd);


--
-- TOC entry 2884 (class 2606 OID 16438)
-- Name: ssotp ssotp_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssotp
    ADD CONSTRAINT ssotp_pkey PRIMARY KEY (id_otp);


--
-- TOC entry 2880 (class 2606 OID 16412)
-- Name: sspelayanan sspelayanan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sspelayanan
    ADD CONSTRAINT sspelayanan_pkey PRIMARY KEY (id_pelayanan);


--
-- TOC entry 2924 (class 2606 OID 33161)
-- Name: ssuser_magang ssuser_magang_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser_magang
    ADD CONSTRAINT ssuser_magang_pkey PRIMARY KEY (id_ssuser_magang);


--
-- TOC entry 2922 (class 2606 OID 33143)
-- Name: ssuser_pembimbing ssuser_pembimbing_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser_pembimbing
    ADD CONSTRAINT ssuser_pembimbing_pkey PRIMARY KEY (id_ssuser_pembimbing);


--
-- TOC entry 2882 (class 2606 OID 16425)
-- Name: ssuser ssuser_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser
    ADD CONSTRAINT ssuser_pkey PRIMARY KEY (id_ssuser);


--
-- TOC entry 2892 (class 2606 OID 16508)
-- Name: sub_bagian sub_bagian_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_bagian
    ADD CONSTRAINT sub_bagian_pkey PRIMARY KEY (id_sub);


--
-- TOC entry 2920 (class 2606 OID 24938)
-- Name: tb_tiket_alat_list tb_tiket_alat_list_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_alat_list
    ADD CONSTRAINT tb_tiket_alat_list_pkey PRIMARY KEY (id_list);


--
-- TOC entry 2918 (class 2606 OID 24925)
-- Name: tb_tiket_alat tb_tiket_alat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_alat
    ADD CONSTRAINT tb_tiket_alat_pkey PRIMARY KEY (id_pelayanan_alat);


--
-- TOC entry 2910 (class 2606 OID 24865)
-- Name: tb_tiket_app tb_tiket_app_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_app
    ADD CONSTRAINT tb_tiket_app_pkey PRIMARY KEY (id_pelayanan_app);


--
-- TOC entry 2898 (class 2606 OID 24690)
-- Name: tb_tiket_aula tb_tiket_aula_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_aula
    ADD CONSTRAINT tb_tiket_aula_pkey PRIMARY KEY (id_pelayanan_aula);


--
-- TOC entry 2906 (class 2606 OID 24816)
-- Name: tb_tiket_hosting tb_tiket_hosting_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_hosting
    ADD CONSTRAINT tb_tiket_hosting_pkey PRIMARY KEY (id_pelayanan_hosting);


--
-- TOC entry 2914 (class 2606 OID 24894)
-- Name: tb_tiket_jaringan_foto tb_tiket_jaringan_foto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_jaringan_foto
    ADD CONSTRAINT tb_tiket_jaringan_foto_pkey PRIMARY KEY (id_pelayanan_jaringan_foto);


--
-- TOC entry 2912 (class 2606 OID 24881)
-- Name: tb_tiket_jaringan tb_tiket_jaringan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_jaringan
    ADD CONSTRAINT tb_tiket_jaringan_pkey PRIMARY KEY (id_pelayanan_jaringan);


--
-- TOC entry 2930 (class 2606 OID 33237)
-- Name: tb_tiket_magang_nilai tb_tiket_magang_nilai_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_magang_nilai
    ADD CONSTRAINT tb_tiket_magang_nilai_pkey PRIMARY KEY (id_magang_nilai);


--
-- TOC entry 2926 (class 2606 OID 33192)
-- Name: tb_tiket_magang tb_tiket_magang_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_magang
    ADD CONSTRAINT tb_tiket_magang_pkey PRIMARY KEY (id_tiket);


--
-- TOC entry 2896 (class 2606 OID 24669)
-- Name: tb_tiket tb_tiket_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket
    ADD CONSTRAINT tb_tiket_pkey PRIMARY KEY (id_tiket);


--
-- TOC entry 2900 (class 2606 OID 24751)
-- Name: tb_tiket_subdomain tb_tiket_subdomain_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_subdomain
    ADD CONSTRAINT tb_tiket_subdomain_pkey PRIMARY KEY (id_pelayanan_subdomain);


--
-- TOC entry 2908 (class 2606 OID 24851)
-- Name: tb_tiket_tte tb_tiket_tte_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_tte
    ADD CONSTRAINT tb_tiket_tte_pkey PRIMARY KEY (id_pelayanan_tte);


--
-- TOC entry 2904 (class 2606 OID 24800)
-- Name: tb_tiket_upload tb_tiket_upload_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_upload
    ADD CONSTRAINT tb_tiket_upload_pkey PRIMARY KEY (id_pelayanan_upload);


--
-- TOC entry 2916 (class 2606 OID 24912)
-- Name: tb_tiket_zoom tb_tiket_zoom_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_zoom
    ADD CONSTRAINT tb_tiket_zoom_pkey PRIMARY KEY (id_pelayanan_zoom);


--
-- TOC entry 2886 (class 2606 OID 16450)
-- Name: verifikator_pelayanan verifikator_pelayanan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.verifikator_pelayanan
    ADD CONSTRAINT verifikator_pelayanan_pkey PRIMARY KEY (id_vpelayanan);


--
-- TOC entry 2932 (class 2606 OID 16426)
-- Name: ssuser id_opd; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser
    ADD CONSTRAINT id_opd FOREIGN KEY (id_opd) REFERENCES public.ssopd(id_opd);


--
-- TOC entry 2941 (class 2606 OID 24788)
-- Name: log_aktifitas_pelayanan log_aktifitas_pelayanan_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.log_aktifitas_pelayanan
    ADD CONSTRAINT log_aktifitas_pelayanan_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2940 (class 2606 OID 24783)
-- Name: log_aktifitas_pelayanan log_aktifitas_pelayanan_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.log_aktifitas_pelayanan
    ADD CONSTRAINT log_aktifitas_pelayanan_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.ssuser(id_ssuser);


--
-- TOC entry 2931 (class 2606 OID 16413)
-- Name: sspelayanan sspelayanan_id_opd_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sspelayanan
    ADD CONSTRAINT sspelayanan_id_opd_fkey FOREIGN KEY (id_opd) REFERENCES public.ssopd(id_opd);


--
-- TOC entry 2952 (class 2606 OID 33162)
-- Name: ssuser_magang ssuser_magang_id_ssuser_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser_magang
    ADD CONSTRAINT ssuser_magang_id_ssuser_fkey FOREIGN KEY (id_ssuser) REFERENCES public.ssuser(id_ssuser);


--
-- TOC entry 2950 (class 2606 OID 33144)
-- Name: ssuser_pembimbing ssuser_pembimbing_id_ssuser_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser_pembimbing
    ADD CONSTRAINT ssuser_pembimbing_id_ssuser_fkey FOREIGN KEY (id_ssuser) REFERENCES public.ssuser(id_ssuser);


--
-- TOC entry 2951 (class 2606 OID 33149)
-- Name: ssuser_pembimbing ssuser_pembimbing_id_sub_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ssuser_pembimbing
    ADD CONSTRAINT ssuser_pembimbing_id_sub_fkey FOREIGN KEY (id_sub) REFERENCES public.sub_bagian(id_sub);


--
-- TOC entry 2949 (class 2606 OID 24926)
-- Name: tb_tiket_alat tb_tiket_alat_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_alat
    ADD CONSTRAINT tb_tiket_alat_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2945 (class 2606 OID 24866)
-- Name: tb_tiket_app tb_tiket_app_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_app
    ADD CONSTRAINT tb_tiket_app_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2938 (class 2606 OID 24696)
-- Name: tb_tiket_aula tb_tiket_aula_id_aula_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_aula
    ADD CONSTRAINT tb_tiket_aula_id_aula_fkey FOREIGN KEY (id_aula) REFERENCES public.ssaula(id_aula);


--
-- TOC entry 2937 (class 2606 OID 24691)
-- Name: tb_tiket_aula tb_tiket_aula_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_aula
    ADD CONSTRAINT tb_tiket_aula_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2943 (class 2606 OID 24839)
-- Name: tb_tiket_hosting tb_tiket_hosting_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_hosting
    ADD CONSTRAINT tb_tiket_hosting_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2935 (class 2606 OID 24670)
-- Name: tb_tiket tb_tiket_id_pelayanan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket
    ADD CONSTRAINT tb_tiket_id_pelayanan_fkey FOREIGN KEY (id_pelayanan) REFERENCES public.sspelayanan(id_pelayanan);


--
-- TOC entry 2936 (class 2606 OID 24675)
-- Name: tb_tiket tb_tiket_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket
    ADD CONSTRAINT tb_tiket_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.ssuser(id_ssuser);


--
-- TOC entry 2947 (class 2606 OID 24895)
-- Name: tb_tiket_jaringan_foto tb_tiket_jaringan_foto_id_pelayanan_jaringan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_jaringan_foto
    ADD CONSTRAINT tb_tiket_jaringan_foto_id_pelayanan_jaringan_fkey FOREIGN KEY (id_pelayanan_jaringan) REFERENCES public.tb_tiket_jaringan(id_pelayanan_jaringan);


--
-- TOC entry 2946 (class 2606 OID 24882)
-- Name: tb_tiket_jaringan tb_tiket_jaringan_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_jaringan
    ADD CONSTRAINT tb_tiket_jaringan_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2939 (class 2606 OID 24752)
-- Name: tb_tiket_subdomain tb_tiket_subdomain_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_subdomain
    ADD CONSTRAINT tb_tiket_subdomain_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2944 (class 2606 OID 24852)
-- Name: tb_tiket_tte tb_tiket_tte_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_tte
    ADD CONSTRAINT tb_tiket_tte_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2942 (class 2606 OID 24801)
-- Name: tb_tiket_upload tb_tiket_upload_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_upload
    ADD CONSTRAINT tb_tiket_upload_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2948 (class 2606 OID 24913)
-- Name: tb_tiket_zoom tb_tiket_zoom_id_tiket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tiket_zoom
    ADD CONSTRAINT tb_tiket_zoom_id_tiket_fkey FOREIGN KEY (id_tiket) REFERENCES public.tb_tiket(id_tiket);


--
-- TOC entry 2934 (class 2606 OID 16456)
-- Name: verifikator_pelayanan verifikator_pelayanan_id_pelayanan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.verifikator_pelayanan
    ADD CONSTRAINT verifikator_pelayanan_id_pelayanan_fkey FOREIGN KEY (id_pelayanan) REFERENCES public.sspelayanan(id_pelayanan);


--
-- TOC entry 2933 (class 2606 OID 16451)
-- Name: verifikator_pelayanan verifikator_pelayanan_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.verifikator_pelayanan
    ADD CONSTRAINT verifikator_pelayanan_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.ssuser(id_ssuser);


-- Completed on 2023-11-08 09:51:14

--
-- PostgreSQL database dump complete
--

