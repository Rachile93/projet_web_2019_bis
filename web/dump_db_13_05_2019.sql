--
-- PostgreSQL database dump
--

-- Dumped from database version 10.1
-- Dumped by pg_dump version 10.4

-- Started on 2019-05-13 15:40:57

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
-- TOC entry 1 (class 3079 OID 12278)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2222 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 201 (class 1259 OID 57729)
-- Name: id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.id_admin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 57663)
-- Name: administrateur; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.administrateur (
    id_admin bigint DEFAULT nextval('public.id_admin_seq'::regclass) NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    mail text NOT NULL,
    date_de_naissance date NOT NULL,
    passeword character varying(128) NOT NULL
);


--
-- TOC entry 202 (class 1259 OID 57731)
-- Name: id_article_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.id_article_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 199 (class 1259 OID 57694)
-- Name: article; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.article (
    id_article bigint DEFAULT nextval('public.id_article_seq'::regclass) NOT NULL,
    nom_article character varying(128),
    prix numeric,
    quantite bigint,
    couleur character varying(128),
    description text,
    dat date,
    type_article character varying(128),
    genre character varying(128),
    taille character varying(128)
);


--
-- TOC entry 200 (class 1259 OID 57702)
-- Name: composer; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.composer (
    id_pannier bigint NOT NULL,
    id_article bigint NOT NULL,
    quantite bigint NOT NULL
);


--
-- TOC entry 204 (class 1259 OID 57735)
-- Name: id_img_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.id_img_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 205 (class 1259 OID 57737)
-- Name: id_pannier_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.id_pannier_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 203 (class 1259 OID 57733)
-- Name: id_user_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 206 (class 1259 OID 57746)
-- Name: images; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.images (
    id_image bigint DEFAULT nextval('public.id_img_seq'::regclass) NOT NULL,
    id_article bigint NOT NULL,
    nom_image text
);


--
-- TOC entry 198 (class 1259 OID 57688)
-- Name: pannier; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pannier (
    id_pannier bigint DEFAULT nextval('public.id_pannier_seq'::regclass) NOT NULL,
    id_user bigint NOT NULL
);


--
-- TOC entry 197 (class 1259 OID 57671)
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.utilisateur (
    id_user bigint DEFAULT nextval('public.id_user_seq'::regclass) NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    email text NOT NULL,
    date_de_naissance date NOT NULL,
    password character varying(128) NOT NULL,
    civilite character(32)
);


--
-- TOC entry 2204 (class 0 OID 57663)
-- Dependencies: 196
-- Data for Name: administrateur; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.administrateur VALUES (1, 'kuete', 'bernard', 'bernard@yahoo.com', '1993-04-28', 'bernard');


--
-- TOC entry 2207 (class 0 OID 57694)
-- Dependencies: 199
-- Data for Name: article; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.article VALUES (12, 'Chemise lyocell et coton', 6, 8, 'noir', 'Descriptif--

Une nouveauté qui ne passera pas inaperçue grâce à sa matière--
légère, douce et soyeuse.--

- Chemise en denim souple--
- Mélange lyocell et coton--
- Léger effet délavé--
- Regular fit / Coupe droite--
- Col à pointes boutonnées--
- Manches longues--
- Ouverture boutonnée devant--
- Poches poitrine rabats boutonnés--
- Pattes boutonnées au bas des manches--
- Poignets ajustables 2 boutons--
- Plis creux haut du dos--
- Longueur 76 cm environ--

Notre mannequin porte une taille M et mesure 1m89--', '2019-03-31', 'chemise', 'homme', 'M');
INSERT INTO public.article VALUES (11, 'T-shirt ''Mickey'' de ''Disney''', 9.00, 1, 'bleu', '--Retombons en enfance avec ce t-shirt  --''Disney'' ! Pour un look décalé on le --porte avec un jean, une paire de --baskets et un perfecto !

-- - Col rond
-- - Manches courtes
-- - Revers aux manches
-- - Imprimé ''Mickey'' à l''avant
-- - Longueur dos : 62 cm

--Notre mannequin porte une taille M et --mesure 1m75

--Référence: WL723
', '2019-02-20', 't-shirt', 'femme', 'M');
INSERT INTO public.article VALUES (7, 'T-shirt avec message en coton bio', 6.00, 7, 'rose', '--On est fan de ces t-shirts aux messages --''feel good'' que l''on porte en toutes --occasions !

-- - T-shirt col rond
-- - Pur coton bio
-- - Manches courtes avec revers
-- - Message brodé à l''avant
-- - Longueur dos : 61 cm

-- Notre mannequin porte une taille M et --mesure 1m75

--Référence: WM871', '2019-02-19', 't-shirt', 'femme', 'M');
INSERT INTO public.article VALUES (13, 'Chemise slim motif jacquard', 11, 12, 'bleu', 'Le jacquard pour un micro motif original, avec cette chemise--
ajustée à associer à vos jeans et chinos préférés.--

- Chemise en pur coton--
- Slim fit / coupe ajustée--
- Manches longues à poignets 2 boutons--
- Col pointes boutonnées--
- Ouverture boutonnée--
- Micro motif en jacquard all-over--
- Plis d''aisance au dos--
- Base arrondie--
- Longueur dos : 76 cm--

- Notre mannequin porte une taille M et mesure 1m87--
', '2019-03-31', 'chemise', 'homme', 'xl');
INSERT INTO public.article VALUES (14, 'Sweat à capuche fourrée', 14, 15, 'blue marine chiné', 'Le petit plus de ce basique confortable et indémodable : une --capuche fourrée façon sherpa pour être bien protégé du froid.--

- Sweat en molleton gratté--
- Manches longues--
- Col montant à capuche fourrée en sherpa + lien de serrage sous --tunnel--
- Ouverture zippée--
- Poche kangourou devant--
- Finition bord-côte à la base et aux poignets--
- Longueur dos : 70 cm--

- Notre mannequin porte une taille M et mesure 1m87--

Référence: WK306--
', '2019-03-31', 'sweat', 'homme', 'L');
INSERT INTO public.article VALUES (17, ' Pantalon skinny tapered', 10, 15, 'beige', 'Confortable et tendance par sa forme tapered et ses bas de --jambes effilochés, le pantalon en twill se renouvelle pour des --looks casual plus branchés.--

- Pantalon tapered, ample au niveau du bassin et des cuisses avec --une fourche légèrement descendue--
- Skinny fit / Coupe très ajustée au bas des jambes--
- Taille standard--
- Passants à la taille pour une ceinture de 4.5 cm de largeur --maximum
- Ouverture patte boutonnée
- Poche ticket + 2 poches plaquées devant, rivets métal
- 2 poches au dos
- Surpiqûres ton sur ton
- Bas de jambes effilochés
- Longueur entrejambe 72 cm, largeur bas de jambe 16,5 cm

Notre mannequin porte une taille 42 et mesure 1m89

Référence: WM735--
', '2019-04-01', 'pantalon', 'homme', 'L');


--
-- TOC entry 2208 (class 0 OID 57702)
-- Dependencies: 200
-- Data for Name: composer; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.composer VALUES (24, 12, 1);
INSERT INTO public.composer VALUES (24, 7, 1);
INSERT INTO public.composer VALUES (29, 13, 1);


--
-- TOC entry 2214 (class 0 OID 57746)
-- Dependencies: 206
-- Data for Name: images; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.images VALUES (3, 7, '\images\t-shirt-avec-message-en-coton-bio-rose-pale-femme-wm871_3_frf1.jpg');
INSERT INTO public.images VALUES (4, 7, '\images\t-shirt-avec-message-en-coton-bio-rose-pale-femme-wm871_3_frf2.jpg');
INSERT INTO public.images VALUES (5, 7, '\images\t-shirt-avec-message-en-coton-bio-rose-pale-femme-wm871_3_frf3.jpg');
INSERT INTO public.images VALUES (6, 7, '\images\t-shirt-avec-message-en-coton-bio-rose-pale-femme-wm871_3_frf4.jpg');
INSERT INTO public.images VALUES (7, 7, '\images\t-shirt-avec-message-en-coton-bio-rose-pale-femme-wm871_3_frf5.jpg');
INSERT INTO public.images VALUES (8, 7, '\images\t-shirt-avec-message-en-coton-bio-rose-pale-femme-wm871_3_frf6.jpg');
INSERT INTO public.images VALUES (19, 11, '.\images\t-shirt-mickey-de-disney-rose-mickey-femme-wl723_4_frf1.jpg');
INSERT INTO public.images VALUES (20, 11, '.\images\t-shirt-mickey-de-disney-rose-mickey-femme-wl723_4_frf2.jpg');
INSERT INTO public.images VALUES (21, 11, '.\images\t-shirt-mickey-de-disney-rose-mickey-femme-wl723_4_frf3.jpg');
INSERT INTO public.images VALUES (22, 11, '.\images\t-shirt-mickey-de-disney-rose-mickey-femme-wl723_4_frf4.jpg');
INSERT INTO public.images VALUES (23, 12, '.\images\chemise-lyocell-et-coton-gris-homme-wn857_1_frf1.jpg');
INSERT INTO public.images VALUES (24, 12, '.\images\chemise-lyocell-et-coton-gris-homme-wn857_1_frf3.jpg');
INSERT INTO public.images VALUES (25, 12, '.\images\chemise-lyocell-et-coton-gris-homme-wn857_1_frf4.jpg');
INSERT INTO public.images VALUES (26, 12, '.\images\chemise-lyocell-et-coton-gris-homme-wn857_1_frf5.jpg');
INSERT INTO public.images VALUES (27, 12, '.\images\chemise-lyocell-et-coton-gris-homme-wn857_1_frf6.jpg');
INSERT INTO public.images VALUES (28, 12, '.\images\chemise-lyocell-et-coton-gris-homme-wn857_1_frm.jpg');
INSERT INTO public.images VALUES (29, 13, '.\images\chemise-slim-motif-jacquard-bleu-homme-wm928_1_frf1.jpg');
INSERT INTO public.images VALUES (30, 13, '.\images\chemise-slim-motif-jacquard-bleu-homme-wm928_1_frf4.jpg');
INSERT INTO public.images VALUES (31, 13, '.\images\chemise-slim-motif-jacquard-bleu-homme-wm928_1_frf5.jpg');
INSERT INTO public.images VALUES (32, 13, '.\images\chemise-slim-motif-jacquard-bleu-homme-wm928_1_frf6.jpg');
INSERT INTO public.images VALUES (33, 13, '.\images\chemise-slim-motif-jacquard-bleu-homme-wm928_1_frf7.jpg');
INSERT INTO public.images VALUES (34, 13, '.\images\chemise-slim-motif-jacquard-bleu-homme-wm928_1_frm.jpg');
INSERT INTO public.images VALUES (35, 14, '.\images\sweat-a-capuche-fourree-bleu-marine-chine-homme-wk306_2_frf1.jpg');
INSERT INTO public.images VALUES (36, 14, '.\images\sweat-a-capuche-fourree-bleu-marine-chine-homme-wk306_2_frf2.jpg');
INSERT INTO public.images VALUES (37, 14, '.\images\sweat-a-capuche-fourree-bleu-marine-chine-homme-wk306_2_frf3.jpg');
INSERT INTO public.images VALUES (38, 14, '.\images\sweat-a-capuche-fourree-bleu-marine-chine-homme-wk306_2_frf4.jpg');
INSERT INTO public.images VALUES (39, 14, '.\images\sweat-a-capuche-fourree-bleu-marine-chine-homme-wk306_2_frf5.jpg');
INSERT INTO public.images VALUES (40, 14, '.\images\sweat-a-capuche-fourree-bleu-marine-chine-homme-wk306_2_frm.jpg');
INSERT INTO public.images VALUES (49, 17, '.\images\chemise-slim-motif-jacquard-bleu-homme-wm928_1_frf5.jpg');
INSERT INTO public.images VALUES (50, 17, '.\images\pantalon-skinny-tapered-marron-gris-homme-wm735_3_frf1.jpg');
INSERT INTO public.images VALUES (51, 17, '.\images\pantalon-skinny-tapered-marron-gris-homme-wm735_3_frf2.jpg');
INSERT INTO public.images VALUES (52, 17, '.\images\pantalon-skinny-tapered-marron-gris-homme-wm735_3_frf3.jpg');
INSERT INTO public.images VALUES (53, 17, '.\images\pantalon-skinny-tapered-marron-gris-homme-wm735_3_frf4.jpg');
INSERT INTO public.images VALUES (54, 17, '.\images\pantalon-skinny-tapered-marron-gris-homme-wm735_3_frf5.jpg');
INSERT INTO public.images VALUES (55, 17, '.\images\pantalon-skinny-tapered-marron-gris-homme-wm735_3_frf6.jpg');


--
-- TOC entry 2206 (class 0 OID 57688)
-- Dependencies: 198
-- Data for Name: pannier; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pannier VALUES (24, 32);
INSERT INTO public.pannier VALUES (28, 41);
INSERT INTO public.pannier VALUES (29, 43);


--
-- TOC entry 2205 (class 0 OID 57671)
-- Dependencies: 197
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.utilisateur VALUES (32, 'djeutsop', 'rachile', 'drachilearmel@yahoo.com', '2019-04-19', '$2y$10$hu6DNW9KA16.fcw1IQt6huUWEx6D3WeJWK16SX2cRAIMDPa0GUdAe', 'madame                          ');
INSERT INTO public.utilisateur VALUES (41, 'feupe', 'sylviane', 'feupe@yahoo.com', '2019-05-15', '$2y$10$wK6DGOwOQh0yl9qZes6zheYF141HJGxIpDQw.Qoq1zh9tBfA4YCua', 'madame                          ');
INSERT INTO public.utilisateur VALUES (42, 'darte', 'armel', 'armel@yahoo.com', '2019-05-08', '$2y$10$M6/juV8euy17laTMOGk2GeqOztBMmUo6jhwU.z4/HAckEAA8gqNAK', 'madame                          ');
INSERT INTO public.utilisateur VALUES (43, 'tidang', 'olive', 'olive@yahoo.com', '2019-05-14', '$2y$10$iyrahrS/dyxIX7AYZkeuo.6REls3hNFL8hZPq3GbS7gWIAi7vN1wW', 'monsieur                        ');


--
-- TOC entry 2223 (class 0 OID 0)
-- Dependencies: 201
-- Name: id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.id_admin_seq', 1, false);


--
-- TOC entry 2224 (class 0 OID 0)
-- Dependencies: 202
-- Name: id_article_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.id_article_seq', 17, true);


--
-- TOC entry 2225 (class 0 OID 0)
-- Dependencies: 204
-- Name: id_img_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.id_img_seq', 55, true);


--
-- TOC entry 2226 (class 0 OID 0)
-- Dependencies: 205
-- Name: id_pannier_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.id_pannier_seq', 29, true);


--
-- TOC entry 2227 (class 0 OID 0)
-- Dependencies: 203
-- Name: id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.id_user_seq', 43, true);


--
-- TOC entry 2062 (class 2606 OID 57670)
-- Name: administrateur pk_administrateur; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.administrateur
    ADD CONSTRAINT pk_administrateur PRIMARY KEY (id_admin);


--
-- TOC entry 2071 (class 2606 OID 57701)
-- Name: article pk_article; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.article
    ADD CONSTRAINT pk_article PRIMARY KEY (id_article);


--
-- TOC entry 2075 (class 2606 OID 57706)
-- Name: composer pk_composer; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.composer
    ADD CONSTRAINT pk_composer PRIMARY KEY (id_pannier, id_article);


--
-- TOC entry 2078 (class 2606 OID 57753)
-- Name: images pk_images; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.images
    ADD CONSTRAINT pk_images PRIMARY KEY (id_image);


--
-- TOC entry 2069 (class 2606 OID 57692)
-- Name: pannier pk_pannier; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pannier
    ADD CONSTRAINT pk_pannier PRIMARY KEY (id_pannier);


--
-- TOC entry 2064 (class 2606 OID 57678)
-- Name: utilisateur pk_utilisateur; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT pk_utilisateur PRIMARY KEY (id_user);


--
-- TOC entry 2066 (class 2606 OID 57764)
-- Name: utilisateur uk_password; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT uk_password UNIQUE (password);


--
-- TOC entry 2072 (class 1259 OID 57708)
-- Name: i_fk_composer_article; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_composer_article ON public.composer USING btree (id_article);


--
-- TOC entry 2073 (class 1259 OID 57707)
-- Name: i_fk_composer_pannier; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_composer_pannier ON public.composer USING btree (id_pannier);


--
-- TOC entry 2076 (class 1259 OID 57759)
-- Name: i_fk_images_article; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_images_article ON public.images USING btree (id_article);


--
-- TOC entry 2067 (class 1259 OID 57693)
-- Name: i_fk_pannier_utilisateur; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX i_fk_pannier_utilisateur ON public.pannier USING btree (id_user);


--
-- TOC entry 2081 (class 2606 OID 57724)
-- Name: composer fk_composer_article; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.composer
    ADD CONSTRAINT fk_composer_article FOREIGN KEY (id_article) REFERENCES public.article(id_article);


--
-- TOC entry 2080 (class 2606 OID 57719)
-- Name: composer fk_composer_pannier; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.composer
    ADD CONSTRAINT fk_composer_pannier FOREIGN KEY (id_pannier) REFERENCES public.pannier(id_pannier);


--
-- TOC entry 2082 (class 2606 OID 57754)
-- Name: images fk_images_article; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.images
    ADD CONSTRAINT fk_images_article FOREIGN KEY (id_article) REFERENCES public.article(id_article);


--
-- TOC entry 2079 (class 2606 OID 57714)
-- Name: pannier fk_pannier_utilisateur; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pannier
    ADD CONSTRAINT fk_pannier_utilisateur FOREIGN KEY (id_user) REFERENCES public.utilisateur(id_user);


-- Completed on 2019-05-13 15:40:58

--
-- PostgreSQL database dump complete
--

