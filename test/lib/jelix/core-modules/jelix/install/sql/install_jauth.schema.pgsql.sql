CREATE TABLE jlx_user (
  usr_login character varying(50) NOT NULL DEFAULT '',
  usr_password character varying(50) NOT NULL DEFAULT '',
  usr_email character varying(255) NOT NULL DEFAULT ''
);

ALTER TABLE ONLY jlx_user
    ADD CONSTRAINT jlx_user_pkey PRIMARY KEY (usr_login);