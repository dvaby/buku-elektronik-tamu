PRAGMA foreign_keys = ON;

-- users
CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE,
  email_verified_at DATETIME,
  password TEXT NOT NULL,
  remember_token TEXT,
  created_at DATETIME,
  updated_at DATETIME,
  group_id INTEGER,
  aktif INTEGER NOT NULL DEFAULT 1,
  FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE SET NULL
);

-- password_reset_tokens
CREATE TABLE password_reset_tokens (
  email TEXT PRIMARY KEY,
  token TEXT NOT NULL,
  created_at DATETIME
);

-- sessions
CREATE TABLE sessions (
  id TEXT PRIMARY KEY,
  user_id INTEGER,
  ip_address TEXT,
  user_agent TEXT,
  payload TEXT NOT NULL,
  last_activity INTEGER NOT NULL
);
CREATE INDEX sessions_user_id_index ON sessions(user_id);
CREATE INDEX sessions_last_activity_index ON sessions(last_activity);

-- buku_tamus
CREATE TABLE buku_tamus (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  identitas TEXT NOT NULL,
  no_hp TEXT,
  instansi_alamat TEXT NOT NULL,
  keperluan TEXT NOT NULL,
  nama TEXT NOT NULL,
  pegawai_temui TEXT,
  jenis_kelamin TEXT NOT NULL CHECK (jenis_kelamin IN ('Laki-laki','Perempuan')),
  anda_sendirian TEXT NOT NULL DEFAULT 'Hanya saya' CHECK (anda_sendirian IN ('Hanya saya','Rombongan')),
  jumlah_rombongan INTEGER,
  usia INTEGER NOT NULL,
  created_at DATETIME,
  updated_at DATETIME
);

-- keperluans
CREATE TABLE keperluans (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nama TEXT NOT NULL,
  created_at DATETIME,
  updated_at DATETIME
);

-- groups
CREATE TABLE groups (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nama TEXT NOT NULL,
  deskripsi TEXT,
  akses_penuh INTEGER NOT NULL DEFAULT 0,
  created_at DATETIME,
  updated_at DATETIME
);

-- permissions
CREATE TABLE permissions (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nama TEXT NOT NULL,
  deskripsi TEXT,
  created_at DATETIME,
  updated_at DATETIME
);

-- feedback
CREATE TABLE feedback (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  buku_tamu_id INTEGER NOT NULL,
  rating INTEGER NOT NULL DEFAULT 0,
  feedback TEXT,
  status TEXT NOT NULL DEFAULT 'baru',
  created_at DATETIME,
  updated_at DATETIME,
  FOREIGN KEY (buku_tamu_id) REFERENCES buku_tamus(id) ON DELETE CASCADE
);

-- group_permission (many-to-many)
CREATE TABLE group_permission (
  group_id INTEGER NOT NULL,
  permission_id INTEGER NOT NULL,
  created_at DATETIME,
  updated_at DATETIME,
  PRIMARY KEY (group_id, permission_id),
  FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE,
  FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
);

-- Additional indexes
CREATE INDEX users_email_unique_index ON users(email);

-- End of schema
