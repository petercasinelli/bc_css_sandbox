--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
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
-- Name: majors; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE majors (
    major_id integer NOT NULL,
    major character varying(100) NOT NULL
);


ALTER TABLE public.majors OWNER TO postgres;

--
-- Name: majors_major_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE majors_major_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.majors_major_id_seq OWNER TO postgres;

--
-- Name: majors_major_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE majors_major_id_seq OWNED BY majors.major_id;


--
-- Name: majors_major_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('majors_major_id_seq', 37, true);


--
-- Name: schools; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE schools (
    school_id integer NOT NULL,
    school character varying(50) NOT NULL
);


ALTER TABLE public.schools OWNER TO postgres;

--
-- Name: TABLE schools; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE schools IS 'Table of schools at Boston College';


--
-- Name: schools_school_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE schools_school_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.schools_school_id_seq OWNER TO postgres;

--
-- Name: schools_school_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE schools_school_id_seq OWNED BY schools.school_id;


--
-- Name: schools_school_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('schools_school_id_seq', 8, true);


--
-- Name: students; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE students (
    student_id integer NOT NULL,
    first character varying(100),
    last character varying(100),
    email character varying(200),
    password character varying(255),
    school_id integer,
    year integer,
    major_id integer,
    bio text,
    skills text,
    software text,
    twitter text,
    facebook text,
    linkedin text,
    dribbble text,
    github text
);


ALTER TABLE public.students OWNER TO postgres;

--
-- Name: TABLE students; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE students IS 'Table of students who are members of BC Skills';


--
-- Name: students_student_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE students_student_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.students_student_id_seq OWNER TO postgres;

--
-- Name: students_student_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE students_student_id_seq OWNED BY students.student_id;


--
-- Name: students_student_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('students_student_id_seq', 5, true);


--
-- Name: major_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY majors ALTER COLUMN major_id SET DEFAULT nextval('majors_major_id_seq'::regclass);


--
-- Name: school_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY schools ALTER COLUMN school_id SET DEFAULT nextval('schools_school_id_seq'::regclass);


--
-- Name: student_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY students ALTER COLUMN student_id SET DEFAULT nextval('students_student_id_seq'::regclass);


--
-- Data for Name: majors; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO majors VALUES (1, 'Computer Science');
INSERT INTO majors VALUES (3, 'Biology');
INSERT INTO majors VALUES (4, 'Chemistry');
INSERT INTO majors VALUES (5, 'Classical Studies');
INSERT INTO majors VALUES (6, 'Communication');
INSERT INTO majors VALUES (7, 'Earth and Environmental Sciences');
INSERT INTO majors VALUES (8, 'Economics');
INSERT INTO majors VALUES (9, 'Education');
INSERT INTO majors VALUES (10, 'English');
INSERT INTO majors VALUES (11, 'Finance');
INSERT INTO majors VALUES (12, 'Accounting');
INSERT INTO majors VALUES (13, 'Fine Arts');
INSERT INTO majors VALUES (14, 'General Management');
INSERT INTO majors VALUES (15, 'German Studies');
INSERT INTO majors VALUES (16, 'History');
INSERT INTO majors VALUES (17, 'Information Systems');
INSERT INTO majors VALUES (18, 'Islamic Civilizations and Societies');
INSERT INTO majors VALUES (19, 'International Studies');
INSERT INTO majors VALUES (20, 'Marketing');
INSERT INTO majors VALUES (21, 'Mathematics');
INSERT INTO majors VALUES (22, 'Management and Organization');
INSERT INTO majors VALUES (23, 'Music');
INSERT INTO majors VALUES (24, 'Nursing');
INSERT INTO majors VALUES (25, 'Operations Management');
INSERT INTO majors VALUES (26, 'Philosophy');
INSERT INTO majors VALUES (27, 'Physics');
INSERT INTO majors VALUES (28, 'Political Science');
INSERT INTO majors VALUES (29, 'Psychology');
INSERT INTO majors VALUES (30, 'Romance Language and Literatures');
INSERT INTO majors VALUES (32, 'Sociology');
INSERT INTO majors VALUES (33, 'Theatre');
INSERT INTO majors VALUES (34, 'Theology');
INSERT INTO majors VALUES (31, 'Slavic and Eastern Languages and Literatures');
INSERT INTO majors VALUES (35, 'African and African Diaspora Studies');
INSERT INTO majors VALUES (36, 'Business Law');
INSERT INTO majors VALUES (37, 'Biochemistry');


--
-- Data for Name: schools; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO schools VALUES (2, 'CSOM');
INSERT INTO schools VALUES (3, 'CSON');
INSERT INTO schools VALUES (4, 'GSSW');
INSERT INTO schools VALUES (5, 'Law');
INSERT INTO schools VALUES (6, 'Lynch School');
INSERT INTO schools VALUES (7, 'School of Theology');
INSERT INTO schools VALUES (8, 'Woods College');
INSERT INTO schools VALUES (1, 'Arts and Sciences');


--
-- Data for Name: students; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO students VALUES (4, 'First', 'Last', 'email@bc.edu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 2014, 1, 'This is a bio', 'html, java, c', 'eclipse, xcode', '@twitterusername', '', '', '', '');
INSERT INTO students VALUES (5, 'First 2', 'Last 2', 'email2@bc.edu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 2013, 3, 'Bio for second student', 'HTML5, Java, C, C#', 'xcode, dreamweaver, eclipse, aptana', '', '', '', '', '');


--
-- Name: majors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY majors
    ADD CONSTRAINT majors_pkey PRIMARY KEY (major_id);


--
-- Name: schools_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY schools
    ADD CONSTRAINT schools_pkey PRIMARY KEY (school_id);


--
-- Name: students_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY students
    ADD CONSTRAINT students_pkey PRIMARY KEY (student_id);


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

