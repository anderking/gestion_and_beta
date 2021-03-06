PGDMP         *                v         
   admgestion    9.6.1    9.6.1 �    [	           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            \	           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            ]	           1262    28997 
   admgestion    DATABASE     �   CREATE DATABASE admgestion WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';
    DROP DATABASE admgestion;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            ^	           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12387    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            _	           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    28998    carrera_documento    TABLE     �   CREATE TABLE carrera_documento (
    id integer NOT NULL,
    carrera_id integer NOT NULL,
    documento_id integer NOT NULL,
    precio double precision,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 %   DROP TABLE public.carrera_documento;
       public         postgres    false    3            �            1259    29001    carrera_documento_id_seq    SEQUENCE     z   CREATE SEQUENCE carrera_documento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.carrera_documento_id_seq;
       public       postgres    false    3    185            `	           0    0    carrera_documento_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE carrera_documento_id_seq OWNED BY carrera_documento.id;
            public       postgres    false    186            �            1259    29003    carreras    TABLE     �   CREATE TABLE carreras (
    id integer NOT NULL,
    carrera character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.carreras;
       public         postgres    false    3            �            1259    29006    carreras_id_seq    SEQUENCE     q   CREATE SEQUENCE carreras_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.carreras_id_seq;
       public       postgres    false    3    187            a	           0    0    carreras_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE carreras_id_seq OWNED BY carreras.id;
            public       postgres    false    188            �            1259    29008 	   data_rows    TABLE       CREATE TABLE data_rows (
    id integer NOT NULL,
    data_type_id integer NOT NULL,
    field character varying(255) NOT NULL,
    type character varying(255) NOT NULL,
    display_name character varying(255) NOT NULL,
    required boolean DEFAULT false NOT NULL,
    browse boolean DEFAULT true NOT NULL,
    read boolean DEFAULT true NOT NULL,
    edit boolean DEFAULT true NOT NULL,
    add boolean DEFAULT true NOT NULL,
    delete boolean DEFAULT true NOT NULL,
    details text,
    "order" integer DEFAULT 1 NOT NULL
);
    DROP TABLE public.data_rows;
       public         postgres    false    3            �            1259    29021    data_rows_id_seq    SEQUENCE     r   CREATE SEQUENCE data_rows_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.data_rows_id_seq;
       public       postgres    false    3    189            b	           0    0    data_rows_id_seq    SEQUENCE OWNED BY     7   ALTER SEQUENCE data_rows_id_seq OWNED BY data_rows.id;
            public       postgres    false    190            �            1259    29023 
   data_types    TABLE     �  CREATE TABLE data_types (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    display_name_singular character varying(255) NOT NULL,
    display_name_plural character varying(255) NOT NULL,
    icon character varying(255),
    model_name character varying(255),
    description character varying(255),
    generate_permissions boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    server_side smallint DEFAULT '0'::smallint NOT NULL,
    controller character varying(255),
    policy_name character varying(255),
    details text
);
    DROP TABLE public.data_types;
       public         postgres    false    3            �            1259    29031    data_types_id_seq    SEQUENCE     s   CREATE SEQUENCE data_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.data_types_id_seq;
       public       postgres    false    191    3            c	           0    0    data_types_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE data_types_id_seq OWNED BY data_types.id;
            public       postgres    false    192            �            1259    29033 
   documentos    TABLE     �   CREATE TABLE documentos (
    id integer NOT NULL,
    "Nombre" character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.documentos;
       public         postgres    false    3            �            1259    29036    documentos_id_seq    SEQUENCE     s   CREATE SEQUENCE documentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.documentos_id_seq;
       public       postgres    false    3    193            d	           0    0    documentos_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE documentos_id_seq OWNED BY documentos.id;
            public       postgres    false    194            �            1259    29038 
   menu_items    TABLE        CREATE TABLE menu_items (
    id integer NOT NULL,
    menu_id integer,
    title character varying(255) NOT NULL,
    url character varying(255) NOT NULL,
    target character varying(255) DEFAULT '_self'::character varying NOT NULL,
    icon_class character varying(255),
    color character varying(255),
    parent_id integer,
    "order" integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    route character varying(255),
    parameters text
);
    DROP TABLE public.menu_items;
       public         postgres    false    3            �            1259    29045    menu_items_id_seq    SEQUENCE     s   CREATE SEQUENCE menu_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.menu_items_id_seq;
       public       postgres    false    3    195            e	           0    0    menu_items_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE menu_items_id_seq OWNED BY menu_items.id;
            public       postgres    false    196            �            1259    29047    menus    TABLE     �   CREATE TABLE menus (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.menus;
       public         postgres    false    3            �            1259    29050    menus_id_seq    SEQUENCE     n   CREATE SEQUENCE menus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.menus_id_seq;
       public       postgres    false    3    197            f	           0    0    menus_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE menus_id_seq OWNED BY menus.id;
            public       postgres    false    198            �            1259    29052 
   migrations    TABLE     �   CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false    3            �            1259    29055    migrations_id_seq    SEQUENCE     s   CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    3    199            g	           0    0    migrations_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;
            public       postgres    false    200            �            1259    29057    password_resets    TABLE     �   CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         postgres    false    3            �            1259    29063    perfils    TABLE     o  CREATE TABLE perfils (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    biography character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.perfils;
       public         postgres    false    3            �            1259    29069    perfils_id_seq    SEQUENCE     p   CREATE SEQUENCE perfils_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.perfils_id_seq;
       public       postgres    false    202    3            h	           0    0    perfils_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE perfils_id_seq OWNED BY perfils.id;
            public       postgres    false    203            �            1259    29071    permission_role    TABLE     c   CREATE TABLE permission_role (
    permission_id integer NOT NULL,
    role_id integer NOT NULL
);
 #   DROP TABLE public.permission_role;
       public         postgres    false    3            �            1259    29074    permissions    TABLE     �   CREATE TABLE permissions (
    id integer NOT NULL,
    key character varying(255) NOT NULL,
    table_name character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.permissions;
       public         postgres    false    3            �            1259    29080    permissions_id_seq    SEQUENCE     t   CREATE SEQUENCE permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.permissions_id_seq;
       public       postgres    false    3    205            i	           0    0    permissions_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE permissions_id_seq OWNED BY permissions.id;
            public       postgres    false    206            �            1259    29082    post_tag    TABLE     �   CREATE TABLE post_tag (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.post_tag;
       public         postgres    false    3            �            1259    29085    post_tag_id_seq    SEQUENCE     q   CREATE SEQUENCE post_tag_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.post_tag_id_seq;
       public       postgres    false    3    207            j	           0    0    post_tag_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE post_tag_id_seq OWNED BY post_tag.id;
            public       postgres    false    208            �            1259    29087 	   programas    TABLE     x  CREATE TABLE programas (
    id integer NOT NULL,
    carrera character varying(255) NOT NULL,
    pensum character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL,
    nrotelefono character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.programas;
       public         postgres    false    3            �            1259    29093    programas_id_seq    SEQUENCE     r   CREATE SEQUENCE programas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.programas_id_seq;
       public       postgres    false    209    3            k	           0    0    programas_id_seq    SEQUENCE OWNED BY     7   ALTER SEQUENCE programas_id_seq OWNED BY programas.id;
            public       postgres    false    210            �            1259    29095    roles    TABLE     �   CREATE TABLE roles (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    display_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.roles;
       public         postgres    false    3            �            1259    29101    roles_id_seq    SEQUENCE     n   CREATE SEQUENCE roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public       postgres    false    3    211            l	           0    0    roles_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE roles_id_seq OWNED BY roles.id;
            public       postgres    false    212            �            1259    29103 	   servicios    TABLE     &  CREATE TABLE servicios (
    id_ser integer NOT NULL,
    servicio character varying(255) NOT NULL,
    otro_serv character varying(255) NOT NULL,
    observaciones character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.servicios;
       public         postgres    false    3            �            1259    29109    servicios_id_ser_seq    SEQUENCE     v   CREATE SEQUENCE servicios_id_ser_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.servicios_id_ser_seq;
       public       postgres    false    213    3            m	           0    0    servicios_id_ser_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE servicios_id_ser_seq OWNED BY servicios.id_ser;
            public       postgres    false    214            �            1259    29111    settings    TABLE     &  CREATE TABLE settings (
    id integer NOT NULL,
    key character varying(255) NOT NULL,
    display_name character varying(255) NOT NULL,
    value text,
    details text,
    type character varying(255) NOT NULL,
    "order" integer DEFAULT 1 NOT NULL,
    "group" character varying(255)
);
    DROP TABLE public.settings;
       public         postgres    false    3            �            1259    29118    settings_id_seq    SEQUENCE     q   CREATE SEQUENCE settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.settings_id_seq;
       public       postgres    false    3    215            n	           0    0    settings_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE settings_id_seq OWNED BY settings.id;
            public       postgres    false    216            �            1259    29120 
   solicituds    TABLE     �   CREATE TABLE solicituds (
    id integer NOT NULL,
    uuid uuid NOT NULL,
    users_id integer NOT NULL,
    documentos json NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.solicituds;
       public         postgres    false    3            �            1259    29126    solicituds_id_seq    SEQUENCE     s   CREATE SEQUENCE solicituds_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.solicituds_id_seq;
       public       postgres    false    3    217            o	           0    0    solicituds_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE solicituds_id_seq OWNED BY solicituds.id;
            public       postgres    false    218            �            1259    29128    sugerencias    TABLE     �   CREATE TABLE sugerencias (
    id integer NOT NULL,
    descripcion character varying(255) NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.sugerencias;
       public         postgres    false    3            �            1259    29131    sugerencias_id_seq    SEQUENCE     t   CREATE SEQUENCE sugerencias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.sugerencias_id_seq;
       public       postgres    false    3    219            p	           0    0    sugerencias_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE sugerencias_id_seq OWNED BY sugerencias.id;
            public       postgres    false    220            �            1259    29133    translations    TABLE     ]  CREATE TABLE translations (
    id integer NOT NULL,
    table_name character varying(255) NOT NULL,
    column_name character varying(255) NOT NULL,
    foreign_key integer NOT NULL,
    locale character varying(255) NOT NULL,
    value text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
     DROP TABLE public.translations;
       public         postgres    false    3            �            1259    29139    translations_id_seq    SEQUENCE     u   CREATE SEQUENCE translations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.translations_id_seq;
       public       postgres    false    3    221            q	           0    0    translations_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE translations_id_seq OWNED BY translations.id;
            public       postgres    false    222            �            1259    29141 
   user_roles    TABLE     X   CREATE TABLE user_roles (
    user_id integer NOT NULL,
    role_id integer NOT NULL
);
    DROP TABLE public.user_roles;
       public         postgres    false    3            �            1259    29144    users    TABLE     �  CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    avatar character varying(255) DEFAULT 'users/default.png'::character varying,
    role_id integer,
    settings text
);
    DROP TABLE public.users;
       public         postgres    false    3            �            1259    29151    users_id_seq    SEQUENCE     n   CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    3    224            r	           0    0    users_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE users_id_seq OWNED BY users.id;
            public       postgres    false    225            V           2604    29153    carrera_documento id    DEFAULT     n   ALTER TABLE ONLY carrera_documento ALTER COLUMN id SET DEFAULT nextval('carrera_documento_id_seq'::regclass);
 C   ALTER TABLE public.carrera_documento ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    186    185            W           2604    29154    carreras id    DEFAULT     \   ALTER TABLE ONLY carreras ALTER COLUMN id SET DEFAULT nextval('carreras_id_seq'::regclass);
 :   ALTER TABLE public.carreras ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    188    187            _           2604    29155    data_rows id    DEFAULT     ^   ALTER TABLE ONLY data_rows ALTER COLUMN id SET DEFAULT nextval('data_rows_id_seq'::regclass);
 ;   ALTER TABLE public.data_rows ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    190    189            b           2604    29156    data_types id    DEFAULT     `   ALTER TABLE ONLY data_types ALTER COLUMN id SET DEFAULT nextval('data_types_id_seq'::regclass);
 <   ALTER TABLE public.data_types ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    192    191            c           2604    29157    documentos id    DEFAULT     `   ALTER TABLE ONLY documentos ALTER COLUMN id SET DEFAULT nextval('documentos_id_seq'::regclass);
 <   ALTER TABLE public.documentos ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    194    193            e           2604    29158    menu_items id    DEFAULT     `   ALTER TABLE ONLY menu_items ALTER COLUMN id SET DEFAULT nextval('menu_items_id_seq'::regclass);
 <   ALTER TABLE public.menu_items ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    196    195            f           2604    29159    menus id    DEFAULT     V   ALTER TABLE ONLY menus ALTER COLUMN id SET DEFAULT nextval('menus_id_seq'::regclass);
 7   ALTER TABLE public.menus ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    198    197            g           2604    29160    migrations id    DEFAULT     `   ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    200    199            h           2604    29161 
   perfils id    DEFAULT     Z   ALTER TABLE ONLY perfils ALTER COLUMN id SET DEFAULT nextval('perfils_id_seq'::regclass);
 9   ALTER TABLE public.perfils ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    202            i           2604    29162    permissions id    DEFAULT     b   ALTER TABLE ONLY permissions ALTER COLUMN id SET DEFAULT nextval('permissions_id_seq'::regclass);
 =   ALTER TABLE public.permissions ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    206    205            j           2604    29163    post_tag id    DEFAULT     \   ALTER TABLE ONLY post_tag ALTER COLUMN id SET DEFAULT nextval('post_tag_id_seq'::regclass);
 :   ALTER TABLE public.post_tag ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    208    207            k           2604    29164    programas id    DEFAULT     ^   ALTER TABLE ONLY programas ALTER COLUMN id SET DEFAULT nextval('programas_id_seq'::regclass);
 ;   ALTER TABLE public.programas ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    210    209            l           2604    29165    roles id    DEFAULT     V   ALTER TABLE ONLY roles ALTER COLUMN id SET DEFAULT nextval('roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    212    211            m           2604    29166    servicios id_ser    DEFAULT     f   ALTER TABLE ONLY servicios ALTER COLUMN id_ser SET DEFAULT nextval('servicios_id_ser_seq'::regclass);
 ?   ALTER TABLE public.servicios ALTER COLUMN id_ser DROP DEFAULT;
       public       postgres    false    214    213            o           2604    29167    settings id    DEFAULT     \   ALTER TABLE ONLY settings ALTER COLUMN id SET DEFAULT nextval('settings_id_seq'::regclass);
 :   ALTER TABLE public.settings ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    216    215            p           2604    29168    solicituds id    DEFAULT     `   ALTER TABLE ONLY solicituds ALTER COLUMN id SET DEFAULT nextval('solicituds_id_seq'::regclass);
 <   ALTER TABLE public.solicituds ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    218    217            q           2604    29169    sugerencias id    DEFAULT     b   ALTER TABLE ONLY sugerencias ALTER COLUMN id SET DEFAULT nextval('sugerencias_id_seq'::regclass);
 =   ALTER TABLE public.sugerencias ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    220    219            r           2604    29170    translations id    DEFAULT     d   ALTER TABLE ONLY translations ALTER COLUMN id SET DEFAULT nextval('translations_id_seq'::regclass);
 >   ALTER TABLE public.translations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    222    221            t           2604    29171    users id    DEFAULT     V   ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    225    224            0	          0    28998    carrera_documento 
   TABLE DATA               b   COPY carrera_documento (id, carrera_id, documento_id, precio, created_at, updated_at) FROM stdin;
    public       postgres    false    185   �       s	           0    0    carrera_documento_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('carrera_documento_id_seq', 12, true);
            public       postgres    false    186            2	          0    29003    carreras 
   TABLE DATA               @   COPY carreras (id, carrera, created_at, updated_at) FROM stdin;
    public       postgres    false    187   ��       t	           0    0    carreras_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('carreras_id_seq', 4, true);
            public       postgres    false    188            4	          0    29008 	   data_rows 
   TABLE DATA               �   COPY data_rows (id, data_type_id, field, type, display_name, required, browse, read, edit, add, delete, details, "order") FROM stdin;
    public       postgres    false    189   <�       u	           0    0    data_rows_id_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('data_rows_id_seq', 60, true);
            public       postgres    false    190            6	          0    29023 
   data_types 
   TABLE DATA               �   COPY data_types (id, name, slug, display_name_singular, display_name_plural, icon, model_name, description, generate_permissions, created_at, updated_at, server_side, controller, policy_name, details) FROM stdin;
    public       postgres    false    191   ��       v	           0    0    data_types_id_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('data_types_id_seq', 9, true);
            public       postgres    false    192            8	          0    29033 
   documentos 
   TABLE DATA               C   COPY documentos (id, "Nombre", created_at, updated_at) FROM stdin;
    public       postgres    false    193   Z�       w	           0    0    documentos_id_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('documentos_id_seq', 3, true);
            public       postgres    false    194            :	          0    29038 
   menu_items 
   TABLE DATA               �   COPY menu_items (id, menu_id, title, url, target, icon_class, color, parent_id, "order", created_at, updated_at, route, parameters) FROM stdin;
    public       postgres    false    195   ��       x	           0    0    menu_items_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('menu_items_id_seq', 17, true);
            public       postgres    false    196            <	          0    29047    menus 
   TABLE DATA               :   COPY menus (id, name, created_at, updated_at) FROM stdin;
    public       postgres    false    197   ��       y	           0    0    menus_id_seq    SEQUENCE SET     3   SELECT pg_catalog.setval('menus_id_seq', 1, true);
            public       postgres    false    198            >	          0    29052 
   migrations 
   TABLE DATA               3   COPY migrations (id, migration, batch) FROM stdin;
    public       postgres    false    199   ��       z	           0    0    migrations_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('migrations_id_seq', 31, true);
            public       postgres    false    200            @	          0    29057    password_resets 
   TABLE DATA               <   COPY password_resets (email, token, created_at) FROM stdin;
    public       postgres    false    201   ��       A	          0    29063    perfils 
   TABLE DATA               a   COPY perfils (id, name, lastname, address, phone, biography, created_at, updated_at) FROM stdin;
    public       postgres    false    202   �       {	           0    0    perfils_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('perfils_id_seq', 1, true);
            public       postgres    false    203            C	          0    29071    permission_role 
   TABLE DATA               :   COPY permission_role (permission_id, role_id) FROM stdin;
    public       postgres    false    204   ~�       D	          0    29074    permissions 
   TABLE DATA               K   COPY permissions (id, key, table_name, created_at, updated_at) FROM stdin;
    public       postgres    false    205    �       |	           0    0    permissions_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('permissions_id_seq', 56, true);
            public       postgres    false    206            F	          0    29082    post_tag 
   TABLE DATA               7   COPY post_tag (id, created_at, updated_at) FROM stdin;
    public       postgres    false    207   ��       }	           0    0    post_tag_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('post_tag_id_seq', 1, false);
            public       postgres    false    208            H	          0    29087 	   programas 
   TABLE DATA               j   COPY programas (id, carrera, pensum, descripcion, nrotelefono, email, created_at, updated_at) FROM stdin;
    public       postgres    false    209   ��       ~	           0    0    programas_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('programas_id_seq', 1, true);
            public       postgres    false    210            J	          0    29095    roles 
   TABLE DATA               H   COPY roles (id, name, display_name, created_at, updated_at) FROM stdin;
    public       postgres    false    211   S�       	           0    0    roles_id_seq    SEQUENCE SET     3   SELECT pg_catalog.setval('roles_id_seq', 2, true);
            public       postgres    false    212            L	          0    29103 	   servicios 
   TABLE DATA               `   COPY servicios (id_ser, servicio, otro_serv, observaciones, created_at, updated_at) FROM stdin;
    public       postgres    false    213   ��       �	           0    0    servicios_id_ser_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('servicios_id_ser_seq', 1, false);
            public       postgres    false    214            N	          0    29111    settings 
   TABLE DATA               Z   COPY settings (id, key, display_name, value, details, type, "order", "group") FROM stdin;
    public       postgres    false    215   ��       �	           0    0    settings_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('settings_id_seq', 10, true);
            public       postgres    false    216            P	          0    29120 
   solicituds 
   TABLE DATA               U   COPY solicituds (id, uuid, users_id, documentos, created_at, updated_at) FROM stdin;
    public       postgres    false    217   �       �	           0    0    solicituds_id_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('solicituds_id_seq', 3, true);
            public       postgres    false    218            R	          0    29128    sugerencias 
   TABLE DATA               P   COPY sugerencias (id, descripcion, user_id, created_at, updated_at) FROM stdin;
    public       postgres    false    219   ��       �	           0    0    sugerencias_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('sugerencias_id_seq', 1, true);
            public       postgres    false    220            T	          0    29133    translations 
   TABLE DATA               p   COPY translations (id, table_name, column_name, foreign_key, locale, value, created_at, updated_at) FROM stdin;
    public       postgres    false    221   �       �	           0    0    translations_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('translations_id_seq', 1, false);
            public       postgres    false    222            V	          0    29141 
   user_roles 
   TABLE DATA               /   COPY user_roles (user_id, role_id) FROM stdin;
    public       postgres    false    223   #�       W	          0    29144    users 
   TABLE DATA               v   COPY users (id, name, email, password, remember_token, created_at, updated_at, avatar, role_id, settings) FROM stdin;
    public       postgres    false    224   H�       �	           0    0    users_id_seq    SEQUENCE SET     3   SELECT pg_catalog.setval('users_id_seq', 2, true);
            public       postgres    false    225            v           2606    29173 (   carrera_documento carrera_documento_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY carrera_documento
    ADD CONSTRAINT carrera_documento_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.carrera_documento DROP CONSTRAINT carrera_documento_pkey;
       public         postgres    false    185    185            x           2606    29175    carreras carreras_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY carreras
    ADD CONSTRAINT carreras_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.carreras DROP CONSTRAINT carreras_pkey;
       public         postgres    false    187    187            z           2606    29177    data_rows data_rows_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY data_rows
    ADD CONSTRAINT data_rows_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.data_rows DROP CONSTRAINT data_rows_pkey;
       public         postgres    false    189    189            |           2606    29179 !   data_types data_types_name_unique 
   CONSTRAINT     U   ALTER TABLE ONLY data_types
    ADD CONSTRAINT data_types_name_unique UNIQUE (name);
 K   ALTER TABLE ONLY public.data_types DROP CONSTRAINT data_types_name_unique;
       public         postgres    false    191    191            ~           2606    29181    data_types data_types_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY data_types
    ADD CONSTRAINT data_types_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.data_types DROP CONSTRAINT data_types_pkey;
       public         postgres    false    191    191            �           2606    29183 !   data_types data_types_slug_unique 
   CONSTRAINT     U   ALTER TABLE ONLY data_types
    ADD CONSTRAINT data_types_slug_unique UNIQUE (slug);
 K   ALTER TABLE ONLY public.data_types DROP CONSTRAINT data_types_slug_unique;
       public         postgres    false    191    191            �           2606    29185    documentos documentos_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.documentos DROP CONSTRAINT documentos_pkey;
       public         postgres    false    193    193            �           2606    29187    menu_items menu_items_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY menu_items
    ADD CONSTRAINT menu_items_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.menu_items DROP CONSTRAINT menu_items_pkey;
       public         postgres    false    195    195            �           2606    29189    menus menus_name_unique 
   CONSTRAINT     K   ALTER TABLE ONLY menus
    ADD CONSTRAINT menus_name_unique UNIQUE (name);
 A   ALTER TABLE ONLY public.menus DROP CONSTRAINT menus_name_unique;
       public         postgres    false    197    197            �           2606    29191    menus menus_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY menus
    ADD CONSTRAINT menus_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.menus DROP CONSTRAINT menus_pkey;
       public         postgres    false    197    197            �           2606    29193    migrations migrations_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    199    199            �           2606    29195    perfils perfils_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY perfils
    ADD CONSTRAINT perfils_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.perfils DROP CONSTRAINT perfils_pkey;
       public         postgres    false    202    202            �           2606    29197 $   permission_role permission_role_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_pkey PRIMARY KEY (permission_id, role_id);
 N   ALTER TABLE ONLY public.permission_role DROP CONSTRAINT permission_role_pkey;
       public         postgres    false    204    204    204            �           2606    29199    permissions permissions_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.permissions DROP CONSTRAINT permissions_pkey;
       public         postgres    false    205    205            �           2606    29201    post_tag post_tag_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY post_tag
    ADD CONSTRAINT post_tag_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.post_tag DROP CONSTRAINT post_tag_pkey;
       public         postgres    false    207    207            �           2606    29203    programas programas_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY programas
    ADD CONSTRAINT programas_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.programas DROP CONSTRAINT programas_pkey;
       public         postgres    false    209    209            �           2606    29205    roles roles_name_unique 
   CONSTRAINT     K   ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_name_unique UNIQUE (name);
 A   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_name_unique;
       public         postgres    false    211    211            �           2606    29207    roles roles_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public         postgres    false    211    211            �           2606    29209    servicios servicios_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY servicios
    ADD CONSTRAINT servicios_pkey PRIMARY KEY (id_ser);
 B   ALTER TABLE ONLY public.servicios DROP CONSTRAINT servicios_pkey;
       public         postgres    false    213    213            �           2606    29211    settings settings_key_unique 
   CONSTRAINT     O   ALTER TABLE ONLY settings
    ADD CONSTRAINT settings_key_unique UNIQUE (key);
 F   ALTER TABLE ONLY public.settings DROP CONSTRAINT settings_key_unique;
       public         postgres    false    215    215            �           2606    29213    settings settings_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY settings
    ADD CONSTRAINT settings_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.settings DROP CONSTRAINT settings_pkey;
       public         postgres    false    215    215            �           2606    29215    solicituds solicituds_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY solicituds
    ADD CONSTRAINT solicituds_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.solicituds DROP CONSTRAINT solicituds_pkey;
       public         postgres    false    217    217            �           2606    29217    sugerencias sugerencias_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY sugerencias
    ADD CONSTRAINT sugerencias_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.sugerencias DROP CONSTRAINT sugerencias_pkey;
       public         postgres    false    219    219            �           2606    29219    translations translations_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY translations
    ADD CONSTRAINT translations_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.translations DROP CONSTRAINT translations_pkey;
       public         postgres    false    221    221            �           2606    29221 J   translations translations_table_name_column_name_foreign_key_locale_unique 
   CONSTRAINT     �   ALTER TABLE ONLY translations
    ADD CONSTRAINT translations_table_name_column_name_foreign_key_locale_unique UNIQUE (table_name, column_name, foreign_key, locale);
 t   ALTER TABLE ONLY public.translations DROP CONSTRAINT translations_table_name_column_name_foreign_key_locale_unique;
       public         postgres    false    221    221    221    221    221            �           2606    29223    user_roles user_roles_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY user_roles
    ADD CONSTRAINT user_roles_pkey PRIMARY KEY (user_id, role_id);
 D   ALTER TABLE ONLY public.user_roles DROP CONSTRAINT user_roles_pkey;
       public         postgres    false    223    223    223            �           2606    29225    users users_email_unique 
   CONSTRAINT     M   ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public         postgres    false    224    224            �           2606    29227    users users_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    224    224            �           1259    29228    password_resets_email_index    INDEX     Q   CREATE INDEX password_resets_email_index ON password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public         postgres    false    201            �           1259    29229 #   permission_role_permission_id_index    INDEX     a   CREATE INDEX permission_role_permission_id_index ON permission_role USING btree (permission_id);
 7   DROP INDEX public.permission_role_permission_id_index;
       public         postgres    false    204            �           1259    29230    permission_role_role_id_index    INDEX     U   CREATE INDEX permission_role_role_id_index ON permission_role USING btree (role_id);
 1   DROP INDEX public.permission_role_role_id_index;
       public         postgres    false    204            �           1259    29231    permissions_key_index    INDEX     E   CREATE INDEX permissions_key_index ON permissions USING btree (key);
 )   DROP INDEX public.permissions_key_index;
       public         postgres    false    205            �           1259    29232    user_roles_role_id_index    INDEX     K   CREATE INDEX user_roles_role_id_index ON user_roles USING btree (role_id);
 ,   DROP INDEX public.user_roles_role_id_index;
       public         postgres    false    223            �           1259    29233    user_roles_user_id_index    INDEX     K   CREATE INDEX user_roles_user_id_index ON user_roles USING btree (user_id);
 ,   DROP INDEX public.user_roles_user_id_index;
       public         postgres    false    223            �           2606    29234 (   data_rows data_rows_data_type_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY data_rows
    ADD CONSTRAINT data_rows_data_type_id_foreign FOREIGN KEY (data_type_id) REFERENCES data_types(id) ON UPDATE CASCADE ON DELETE CASCADE;
 R   ALTER TABLE ONLY public.data_rows DROP CONSTRAINT data_rows_data_type_id_foreign;
       public       postgres    false    2174    191    189            �           2606    29239 %   menu_items menu_items_menu_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY menu_items
    ADD CONSTRAINT menu_items_menu_id_foreign FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE;
 O   ALTER TABLE ONLY public.menu_items DROP CONSTRAINT menu_items_menu_id_foreign;
       public       postgres    false    195    2184    197            �           2606    29244 5   permission_role permission_role_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE;
 _   ALTER TABLE ONLY public.permission_role DROP CONSTRAINT permission_role_permission_id_foreign;
       public       postgres    false    205    204    2196            �           2606    29249 /   permission_role permission_role_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE;
 Y   ALTER TABLE ONLY public.permission_role DROP CONSTRAINT permission_role_role_id_foreign;
       public       postgres    false    2204    204    211            �           2606    29254 '   sugerencias sugerencias_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY sugerencias
    ADD CONSTRAINT sugerencias_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;
 Q   ALTER TABLE ONLY public.sugerencias DROP CONSTRAINT sugerencias_user_id_foreign;
       public       postgres    false    224    2226    219            �           2606    29259 %   user_roles user_roles_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY user_roles
    ADD CONSTRAINT user_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE;
 O   ALTER TABLE ONLY public.user_roles DROP CONSTRAINT user_roles_role_id_foreign;
       public       postgres    false    211    223    2204            �           2606    29264 %   user_roles user_roles_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY user_roles
    ADD CONSTRAINT user_roles_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;
 O   ALTER TABLE ONLY public.user_roles DROP CONSTRAINT user_roles_user_id_foreign;
       public       postgres    false    223    2226    224            �           2606    29269    users users_role_id_foreign    FK CONSTRAINT     l   ALTER TABLE ONLY users
    ADD CONSTRAINT users_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles(id);
 E   ALTER TABLE ONLY public.users DROP CONSTRAINT users_role_id_foreign;
       public       postgres    false    211    224    2204            0	   �   x�}ϱ�0E�������!<���#��R��=� ��T�ާ�z!?�eY*ld�+�	�9Ci�-[�%`������rV������+�2rF��Π{�xapк5��]��^<��(� 
��	F�      2	   |   x�3���KO��L-�LTH�S��K�/�M,�LN�420��54�5�T0��26�22�&�e�l�sfYf�2Slb\��ZӋ�3�RJ�K�<3L�����q��y!�(?�4993?S�)#L��b���� +UBm      4	   �  x��V]��:}�Ŋ竫�}��VU�v�jw��R�'�
a�mT���CtK�������{���a��,%�X˚��!�l���-a���$F~3䶱z0>���Bd��v��i T%�����d�u���4w�_�B��VF}��[�C��ob�a�!����R����
��(*r�W�QK�hҾJ%=��#v�i��"��IV��$W��KO�Ү�Q�Z��i�V��媖�0�*�SV�����ْ�^�R�{�����G�>���������ei�?�k�/=������n���Bh��}Q��U�"�Y�7f.��^i��\V� \e_�Y�Wo����a���Z���z��W�{��/���m���f�ݮ�,<��(cP!W�������m{����Ҙ���,Mq�?v���Y<'���e �z�� �o��Ҝ���}P~.���9/���� kv�>�\b7.r�\�!���l�}Y�>���$ �m:����� ؈���p����]����d���C޵�" S�7uVm�wmA���bP�Z�˭*U�p��!$�L~ ������-��`Ŕ/���(�J(g$�T�� L�Fg�ʅ6'໣7֚ �4���{�9c�yh���v�;g�u�`�L�jQ=�����c��뛀5_�%�&� ܪb]w
��X�83k>X3�h�I<�u ��z0-tv�X��I2�w@���=Ԧ~���/AH�f_��IG��"ϐ8��e^�!}�f�ѐ��d�a �~�Ak\fZ���X���//���)�L�1��HlNs��l?��p����g���Loܺ�*;Y�'�7\u����6�E��U�����	�-O�9�$��%�=�Inz�t���!Dټ�h����~w�՝����/��'� /r      6	   n  x���_k�0ş�(}�#F[m�F{j)��(�Y��F���4Fc]�X�r��ܐ�� 4�
i�U�	>�1�S�Wꃗ�e�H�[���9e�}� � ���I��p�� ]���
j��_G@6Z6��Z���
Y_�ҧ�E6��!�Qi�I���P�}\�O_34��{�R9p[�z#O��J��k��|^�Q�tf���\�T�2ΚC9�e�؝��BV,=����PO�`��[]M���+\8��@�S7����Zgm�Ec;��)� �Y�^q��Ю:k���M��h��F��1�R!�P��7��t��u7
�lCt[�!���u�o5Y]N~��_k�f�,
0�e������D      8	   X   x�3��/)�/�420��54�5�T0��26�20@3�2��2��,)�!N�����!�_~Ib��sjQIfZfrbJ"�fS���͸b���� �m$-      :	   �  x����n�0F��)|�n����ݙ,�65-,�ۯ�Rm�011�B����-�����r$�f���P~���<#��[������3%���c&�3E=lm�^Q��X��Ǥ��')s��}��5Q6��xFJ��'kj��5��I�4MNҫ�x�%T{ɂK�	�5IՄ�e�oK�6�PֳU��Q� fU{�}�0�zP jF��G��ؓ�\z��ګb�Z����[��[��S��{ג�V�种v[(���L�fuo���7TU�<k�X�˻L�u��p�!W�v��õ.Q�����La��- :��ĉ$�k�:���J�`��	�E����1S�5���!i�g�"G4慉�Uk25͊6Ј˿��"jګXz�1SS,YE�+f�i;&��Q���l`���q��:�m��G���i��QV�^s�۶���ұ      <	   +   x�3�LL����420��54�5�T04�21�26�&����� 6U
�      >	     x�u��� �Of��]VBL�t�&��Q�~%�̶U��w��|`\B#e�>rtZ-7���A}��.X�po��o�&�סHX�����}J�4ɻ}��v���2z�<���L*(7]j�L	���q�vz��vp�#���U�����{��
f���,HFq01~d��b�7v=��Ds��AG7���A������:�#�rwJЛ)i j���:ng7j�3�R&,"N"р���V?�@�*+�wY���]�j��6��Y��"<!�mmu�k� f����8vY��1UJZ�J��w�i����phnv6�#9~ӭ��>*�nW��E���O	�6�efi��eO��t���E�pV����=Ŵ}�N	$v�A( ��Ief�ff�"kO|�zW�V9j�SG���U+n}���Ҁ�`D��ot/�u4�2$�<o8�ޟ�4�ζ�%��|8Xg�N-��]�鉢�S�o;n��[��3�q�������Ӯ6=��a.�r���MU�5'��(����QQ���O!8+WV\m��4���r��R���      @	      x������ � �      A	   X   x�m�1�  ����`(a@��XH#B���덻��$�zO&z�%}�P�<:Pӓ���;�*�pg1tW�!���������Lh      C	   r   x�Ϲ1E��*�X^>zq�u���c���'��z���������r�1�0�0� �H"�$�H"�$�H"�"���9DEQDE4�D}��h��&�hb�!�b�OC���?f6$V      D	   �  x���Kn�0E��*��Tؘ�YDW�r����8�A�~i�!�ǄX� �����5�ksC�DR=����U�-�a�ɳ�\l!SO
��37r�<|���[�̓��޹1[����[o����s��PZ��-�(�D\�=�$H�VvqoK��J�Vd��ijÊbS�V�qE���+������j�u+�u�bm�bP�E�v�u��bPX�v���i ��@Zp��}+���Hs�޵�h~���g��(���/�aZ�I���đ&�i���d	��]ꯦ�wvwZ.��4u������g6�X�b�5�f
U����)����X%��N]7��N���~%��@O�h͵�z�wX����{����� �m*@�
p�0������FĆ/���,_�ř%�#�GI&C��:oT��M׋��&��|ig��@��>�b���� �sz�����      F	      x������ � �      H	   K   x�3�4D������̒�NC3C#c��Ģ�D��������\N#C]C#]CKC+ 20�&����� %�      J	   J   x�3�LL����t���%E�%�E�F���F���
��V&FVƦ�ĸ�8K�S�8��rsBAlb���qqq ��      L	      x������ � �      N	   '  x�}�OO�0����.�:��P�r��Ҕ5!�Hc�d�}{�8� n��{�Ϋ��A�A#�c,���,�����*f��{�߃FK��9��aNَcz�J�9A5A
Q�斛}н_��7m�Zv���<��ChV,��n���-7Q��,�'�F^9�YMj�XP\f�C"
�	�t�p����i<�:��Y�	!۔�m%<h���I�Z���4� i�u�b��x�-=�s$�&��G���MlL~]gMu�E��6��]���l�H�'�o7ȝ8g��^ʢ(� �D�7      P	   �   x�}ϻ�0@�9���3A��4�����T	�R�TX(ɋ�rl�:pTT@HY�p� 2t�}�Cvn���\��B�����+�m5��v�U��	����"��8�07�2աR�a~ic���/��+��81��sN߿�Ԫ�(���P~��o+}} �'���j���? g2R@      R	   4   x�3��IT(���L�,)M�4�420��54�5�T0��22�2��&����� �%u      T	      x������ � �      V	      x�3�4�2�4����� ��      W	   �   x�Mȱr�0 �9<E�c�'*���mO�m����( 6bA�w�Х�7|)i��}Q�R����C������ƫ~�Q�-�ū�rS�D�w>��oQ?�ֽ������屙����z>~&������"dh����K���`���P�$�'�M5"��w�I�p��f�g�#�fM;��riT�����J�Re6��־Y��eY��1D^     