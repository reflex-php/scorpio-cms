PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE "migrations" ("migration" varchar not null, "batch" integer not null);
INSERT INTO "migrations" VALUES('2014_10_12_000000_create_users_table',1);
INSERT INTO "migrations" VALUES('2014_10_12_100000_create_password_resets_table',1);
INSERT INTO "migrations" VALUES('2016_07_11_084014_create_pages_table',1);
INSERT INTO "migrations" VALUES('2016_07_11_085217_create_sessions_table',1);
INSERT INTO "migrations" VALUES('2016_07_11_204038_create_themes_table',2);
CREATE TABLE "users" ("id" integer not null primary key autoincrement, "name" varchar not null, "email" varchar not null, "password" varchar not null, "remember_token" varchar null, "created_at" datetime null, "updated_at" datetime null);
INSERT INTO "users" VALUES(1,'Mike','contact@mikeshellard.me','$2y$10$.vVMLl.0TT49uoRoJpuqGO5SIjO7qIlysxYzfbccRgcvS0VsZoEUC','8VVxkzep2c0r5LOq1sQM28Dgui8MirO7VxoqZqIPrZyYwtPNCe4PKcKffnCq','2016-07-11 13:35:19','2016-07-11 13:38:10');
CREATE TABLE "password_resets" ("email" varchar not null, "token" varchar not null, "created_at" datetime null);
CREATE TABLE "pages" ("id" integer not null primary key autoincrement, "title" varchar not null, "slug" varchar not null, "theme_id" integer null, "body" text not null, "active" tinyint(1) not null default '1', "created_at" datetime null, "updated_at" datetime null);
INSERT INTO "pages" VALUES(11,'Niiiiice','awesome',1,'woooooot',1,'2016-07-11 11:18:57','2016-07-12 17:04:48');
INSERT INTO "pages" VALUES(12,'Vue modal 4','vue-modal-4',1,'<b>test</b>',1,'2016-07-11 16:52:42','2016-07-12 17:04:48');
CREATE TABLE "sessions" ("id" varchar not null, "user_id" integer null, "ip_address" varchar null, "user_agent" text null, "payload" text not null, "last_activity" integer not null);
CREATE TABLE "themes" (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL UNIQUE,
	`path`	varchar NOT NULL UNIQUE,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO "themes" VALUES(1,'Default','default','2016-07-11 20:54:03','2016-07-12 09:42:38');
CREATE TABLE "page_theme" ("page_id" integer not null, "theme_id" integer not null);
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('pages',12);
INSERT INTO "sqlite_sequence" VALUES('users',1);
INSERT INTO "sqlite_sequence" VALUES('themes',14);
CREATE UNIQUE INDEX "users_email_unique" on "users" ("email");
CREATE INDEX "password_resets_email_index" on "password_resets" ("email");
CREATE INDEX "password_resets_token_index" on "password_resets" ("token");
CREATE UNIQUE INDEX "pages_slug_unique" on "pages" ("slug");
CREATE UNIQUE INDEX "sessions_id_unique" on "sessions" ("id");
CREATE UNIQUE INDEX "page_theme_page_id_theme_id_unique" on "page_theme" ("page_id", "theme_id");
COMMIT;
