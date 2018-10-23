CREATE TABLE article (
ref INTEGER PRIMARY KEY,
prix REAL,
libelle TEXT,
description TEXT,
image TEXT,
stock INTEGER,
categorie INTEGER,
FOREIGN KEY(categorie) REFERENCES categorie(id)
);

CREATE TABLE categorie (
  id INTEGER PRIMARY KEY,
  nom TEXT,
  pere INTEGER,
  FOREIGN KEY(pere) REFERENCES categorie(id)
);
