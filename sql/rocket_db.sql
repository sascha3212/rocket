CREATE TABLE absentie
(
    startdatum DATE PRIMARY KEY NOT NULL,
    einddatum DATE,
    notitie VARCHAR(45),
    users_id INT(11) NOT NULL,
    absentietype_absentietype_id INT(11) NOT NULL,
    CONSTRAINT fk_absentie_users1 FOREIGN KEY (users_id) REFERENCES users (id),
    CONSTRAINT fk_absentie_absentietype1 FOREIGN KEY (absentietype_absentietype_id) REFERENCES absentietype (absentietype_id)
);
CREATE INDEX fk_absentie_absentietype1_idx ON absentie (absentietype_absentietype_id);
CREATE INDEX fk_absentie_users1_idx ON absentie (users_id);
CREATE TABLE absentietype
(
    absentietype_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    absentietype VARCHAR(45) NOT NULL
);
CREATE TABLE autorisatie
(
    startdatum DATE PRIMARY KEY NOT NULL,
    einddatum DATE,
    notitie VARCHAR(45),
    rol_rol_id INT(11) NOT NULL,
    recht_recht_id INT(11) NOT NULL,
    CONSTRAINT fk_autorisatie_rol1 FOREIGN KEY (rol_rol_id) REFERENCES rol (rol_id),
    CONSTRAINT fk_autorisatie_recht1 FOREIGN KEY (recht_recht_id) REFERENCES recht (recht_id)
);
CREATE INDEX fk_autorisatie_recht1_idx ON autorisatie (recht_recht_id);
CREATE INDEX fk_autorisatie_rol1_idx ON autorisatie (rol_rol_id);
CREATE TABLE betaling
(
    betaling_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    bankrekening VARCHAR(45),
    kas INT(1) DEFAULT '1',
    bedrag DECIMAL(6,2) NOT NULL,
    datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    users_id INT(11) NOT NULL,
    contract_contract_id INT(11) NOT NULL,
    CONSTRAINT fk_betaling_users1 FOREIGN KEY (users_id) REFERENCES users (id),
    CONSTRAINT fk_betaling_contract1 FOREIGN KEY (contract_contract_id) REFERENCES contract (contract_id)
);
CREATE INDEX fk_betaling_contract1_idx ON betaling (contract_contract_id);
CREATE INDEX fk_betaling_users1_idx ON betaling (users_id);
CREATE TABLE contract
(
    contract_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    notitie VARCHAR(255),
    lespakket_lespakket_id INT(11) NOT NULL,
    users_id INT(11) NOT NULL,
    instructeur_id INT(11),
    CONSTRAINT fk_contract_lespakket1 FOREIGN KEY (lespakket_lespakket_id) REFERENCES lespakket (lespakket_id),
    CONSTRAINT fk_contract_users1 FOREIGN KEY (users_id) REFERENCES users (id),
    CONSTRAINT fk_contract_instructeur FOREIGN KEY (instructeur_id) REFERENCES users (id)
);
CREATE INDEX fk_contract_instructeur ON contract (instructeur_id);
CREATE INDEX fk_contract_lespakket1_idx ON contract (lespakket_lespakket_id);
CREATE INDEX user_id ON contract (users_id);
CREATE TABLE document
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    document VARCHAR(255) NOT NULL,
    locatie VARCHAR(255) NOT NULL,
    mailbericht_id INT(11) NOT NULL,
    CONSTRAINT fk_document_mailbericht FOREIGN KEY (mailbericht_id) REFERENCES mailbericht (id)
);
CREATE INDEX fk_document_mailbericht_idx ON document (mailbericht_id);
CREATE TABLE feestdag
(
    datum DATE PRIMARY KEY NOT NULL,
    einddatum DATE,
    feestdag VARCHAR(45) NOT NULL,
    notitie TEXT
);
CREATE TABLE infobeheer
(
    startdatum DATE PRIMARY KEY NOT NULL,
    einddatum DATE,
    rol_rol_id INT(11) NOT NULL,
    informatie_informatie_id INT(11) NOT NULL,
    CONSTRAINT fk_infobeheer_rol1 FOREIGN KEY (rol_rol_id) REFERENCES rol (rol_id),
    CONSTRAINT fk_infobeheer_informatie1 FOREIGN KEY (informatie_informatie_id) REFERENCES informatie (informatie_id)
);
CREATE INDEX fk_infobeheer_informatie1_idx ON infobeheer (informatie_informatie_id);
CREATE INDEX fk_infobeheer_rol1_idx ON infobeheer (rol_rol_id);
CREATE TABLE informatie
(
    informatie_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titel VARCHAR(225) NOT NULL,
    image VARCHAR(255),
    informatie TEXT NOT NULL,
    nieuws INT(1) DEFAULT '0' NOT NULL,
    startdatum DATE NOT NULL,
    einddatum DATE
);
CREATE TABLE les
(
    les_id INT(11) PRIMARY KEY NOT NULL,
    lesdatum DATE NOT NULL,
    starttijd TIME NOT NULL,
    eindtijd TIME NOT NULL,
    lesverslag TEXT,
    ophaaladres VARCHAR(255),
    geannuleerd INT(4) NOT NULL,
    instructeur INT(11) NOT NULL,
    klant INT(11) NOT NULL,
    lestype_lestype_id INT(11) NOT NULL,
    voertuig_kenteken VARCHAR(12) NOT NULL,
    CONSTRAINT fk_les_users1 FOREIGN KEY (instructeur) REFERENCES users (id),
    CONSTRAINT fk_les_users2 FOREIGN KEY (klant) REFERENCES users (id),
    CONSTRAINT fk_les_lestype1 FOREIGN KEY (lestype_lestype_id) REFERENCES lestype (lestype_id),
    CONSTRAINT fk_les_voertuig1 FOREIGN KEY (voertuig_kenteken) REFERENCES voertuig (kenteken)
);
CREATE INDEX fk_les_lestype1_idx ON les (lestype_lestype_id);
CREATE INDEX fk_les_users1_idx ON les (instructeur);
CREATE INDEX fk_les_users2_idx ON les (klant);
CREATE INDEX fk_les_voertuig1_idx ON les (voertuig_kenteken);
CREATE TABLE lespakket
(
    lespakket_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lespakket VARCHAR(45) NOT NULL,
    lessenaantal INT(11) NOT NULL,
    actie INT(11),
    voertuigtype_voertuigtype_id INT(11) NOT NULL,
    CONSTRAINT fk_lespakket_voertuigtype1 FOREIGN KEY (voertuigtype_voertuigtype_id) REFERENCES voertuigtype (voertuigtype_id)
);
CREATE INDEX fk_lespakket_voertuigtype1_idx ON lespakket (voertuigtype_voertuigtype_id);
CREATE TABLE lesprijs
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    startdatum DATE NOT NULL,
    einddatum DATE,
    prijs DECIMAL(6,2) NOT NULL,
    lespakket_lespakket_id INT(11) NOT NULL,
    CONSTRAINT fk_lesprijs_lespakket1 FOREIGN KEY (lespakket_lespakket_id) REFERENCES lespakket (lespakket_id)
);
CREATE INDEX fk_lesprijs_lespakket1_idx ON lesprijs (lespakket_lespakket_id);
CREATE TABLE lestype
(
    lestype_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lestype INT(11) NOT NULL,
    prijspercentage VARCHAR(45) NOT NULL
);
CREATE TABLE lesverichting
(
    rijhandeling_rijhandeling_id INT(11) NOT NULL,
    les_les_id INT(11) NOT NULL,
    CONSTRAINT fk_lesverichting_rijhandeling1 FOREIGN KEY (rijhandeling_rijhandeling_id) REFERENCES rijhandeling (rijhandeling_id),
    CONSTRAINT fk_lesverichting_les1 FOREIGN KEY (les_les_id) REFERENCES les (les_id)
);
CREATE INDEX fk_lesverichting_les1_idx ON lesverichting (les_les_id);
CREATE INDEX fk_lesverichting_rijhandeling1_idx ON lesverichting (rijhandeling_rijhandeling_id);
CREATE TABLE licentie
(
    startdatum DATE PRIMARY KEY NOT NULL,
    einddatum DATE,
    voertuigtype_voertuigtype_id INT(11) NOT NULL,
    users_id INT(11) NOT NULL,
    CONSTRAINT fk_licentie_voertuigtype1 FOREIGN KEY (voertuigtype_voertuigtype_id) REFERENCES voertuigtype (voertuigtype_id),
    CONSTRAINT fk_licentie_users1 FOREIGN KEY (users_id) REFERENCES users (id)
);
CREATE INDEX fk_licentie_users1_idx ON licentie (users_id);
CREATE INDEX fk_licentie_voertuigtype1_idx ON licentie (voertuigtype_voertuigtype_id);
CREATE TABLE mailbericht
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    verzendDatum DATE NOT NULL,
    onderwerp VARCHAR(255) NOT NULL,
    mailbericht TEXT NOT NULL,
    users_id INT(11) NOT NULL,
    CONSTRAINT fk_mailbericht_users1 FOREIGN KEY (users_id) REFERENCES users (id)
);
CREATE INDEX fk_mailbericht_users1_idx ON mailbericht (users_id);
CREATE TABLE mailontvangers
(
    mailbericht_id INT(11) PRIMARY KEY NOT NULL,
    users_id INT(11) NOT NULL,
    CONSTRAINT fk_mailontvangers_mailbericht1 FOREIGN KEY (mailbericht_id) REFERENCES mailbericht (id),
    CONSTRAINT fk_mailontvangers_users1 FOREIGN KEY (users_id) REFERENCES users (id)
);
CREATE INDEX fk_mailontvangers_users1_idx ON mailontvangers (users_id);
CREATE TABLE onderdeel
(
    onderdeel_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    onderdeel VARCHAR(45) NOT NULL,
    omschrijving TEXT,
    voertuigtype_voertuigtype_id INT(11) NOT NULL,
    CONSTRAINT fk_onderdeel_voertuigtype1 FOREIGN KEY (voertuigtype_voertuigtype_id) REFERENCES voertuigtype (voertuigtype_id)
);
CREATE INDEX fk_onderdeel_voertuigtype1_idx ON onderdeel (voertuigtype_voertuigtype_id);
CREATE TABLE onderdeelprijs
(
    startdatum DATE PRIMARY KEY NOT NULL,
    einddatum DATE,
    prijs CHAR(1) NOT NULL,
    onderdeel_onderdeel_id INT(11) NOT NULL,
    CONSTRAINT fk_onderdeelprijs_onderdeel1 FOREIGN KEY (onderdeel_onderdeel_id) REFERENCES onderdeel (onderdeel_id)
);
CREATE INDEX fk_onderdeelprijs_onderdeel1_idx ON onderdeelprijs (onderdeel_onderdeel_id);
CREATE TABLE onderhoudsbeurt
(
    beurtnummer INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    startdatum DATE NOT NULL,
    einddatum DATE NOT NULL,
    arbeidsloon DECIMAL(8,2) NOT NULL,
    `km-stand` INT(11) NOT NULL,
    voertuig_kenteken VARCHAR(12) NOT NULL,
    users_id INT(11) NOT NULL,
    CONSTRAINT fk_onderhoudsbeurt_voertuig1 FOREIGN KEY (voertuig_kenteken) REFERENCES voertuig (kenteken),
    CONSTRAINT fk_onderhoudsbeurt_users1 FOREIGN KEY (users_id) REFERENCES users (id)
);
CREATE INDEX fk_onderhoudsbeurt_users1_idx ON onderhoudsbeurt (users_id);
CREATE INDEX fk_onderhoudsbeurt_voertuig1_idx ON onderhoudsbeurt (voertuig_kenteken);
CREATE TABLE recht
(
    recht_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    recht VARCHAR(45)
);
CREATE TABLE reparatiebon
(
    aantal INT(11),
    onderhoudsbeurt_beurtnummer INT(11) NOT NULL,
    onderdeel_onderdeel_id INT(11) NOT NULL,
    CONSTRAINT fk_reparatiebon_onderhoudsbeurt1 FOREIGN KEY (onderhoudsbeurt_beurtnummer) REFERENCES onderhoudsbeurt (beurtnummer),
    CONSTRAINT fk_reparatiebon_onderdeel1 FOREIGN KEY (onderdeel_onderdeel_id) REFERENCES onderdeel (onderdeel_id)
);
CREATE INDEX fk_reparatiebon_onderdeel1_idx ON reparatiebon (onderdeel_onderdeel_id);
CREATE INDEX fk_reparatiebon_onderhoudsbeurt1_idx ON reparatiebon (onderhoudsbeurt_beurtnummer);
CREATE TABLE rijhandeling
(
    rijhandeling_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rijhandeling VARCHAR(255) NOT NULL,
    voertuigtype_voertuigtype_id INT(11) NOT NULL,
    CONSTRAINT fk_rijhandeling_voertuigtype1 FOREIGN KEY (voertuigtype_voertuigtype_id) REFERENCES voertuigtype (voertuigtype_id)
);
CREATE INDEX fk_rijhandeling_voertuigtype1_idx ON rijhandeling (voertuigtype_voertuigtype_id);
CREATE TABLE rol
(
    rol_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rol VARCHAR(45) NOT NULL
);
CREATE TABLE roltoekenning
(
    startdatum DATE PRIMARY KEY NOT NULL,
    einddatum DATE,
    users_id INT(11) NOT NULL,
    rol_rol_id INT(11) NOT NULL,
    CONSTRAINT roltoekenning_ibfk_4 FOREIGN KEY (users_id) REFERENCES users (id),
    CONSTRAINT roltoekenning_ibfk_5 FOREIGN KEY (rol_rol_id) REFERENCES rol (rol_id)
);
CREATE INDEX fk_roltoekenning_rol1_idx ON roltoekenning (rol_rol_id);
CREATE INDEX fk_roltoekenning_users1_idx ON roltoekenning (users_id);
CREATE TABLE users
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    voornaam VARCHAR(45),
    tussenvoegsel VARCHAR(10),
    achternaam VARCHAR(45),
    geboren VARCHAR(45),
    geslacht VARCHAR(1),
    adres VARCHAR(45),
    huisnr VARCHAR(10),
    postcode VARCHAR(15),
    plaats VARCHAR(45),
    telefoon VARCHAR(45),
    email VARCHAR(45),
    username VARCHAR(45),
    password VARCHAR(255),
    remember_token VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
);
CREATE TABLE voertuig
(
    kenteken VARCHAR(12) PRIMARY KEY NOT NULL,
    merk VARCHAR(45) NOT NULL,
    aankoopdatum DATE NOT NULL,
    voertuigtype_voertuigtype_id INT(11) NOT NULL,
    CONSTRAINT fk_voertuig_voertuigtype1 FOREIGN KEY (voertuigtype_voertuigtype_id) REFERENCES voertuigtype (voertuigtype_id)
);
CREATE INDEX fk_voertuig_voertuigtype1_idx ON voertuig (voertuigtype_voertuigtype_id);
CREATE TABLE voertuiggebruiker
(
    startdatum DATE PRIMARY KEY NOT NULL,
    einddatum DATE,
    users_id INT(11) NOT NULL,
    voertuig_kenteken VARCHAR(12) NOT NULL,
    CONSTRAINT fk_voertuiggebruiker_users1 FOREIGN KEY (users_id) REFERENCES users (id),
    CONSTRAINT fk_voertuiggebruiker_voertuig1 FOREIGN KEY (voertuig_kenteken) REFERENCES voertuig (kenteken)
);
CREATE INDEX fk_voertuiggebruiker_users1_idx ON voertuiggebruiker (users_id);
CREATE INDEX fk_voertuiggebruiker_voertuig1_idx ON voertuiggebruiker (voertuig_kenteken);
CREATE TABLE voertuigtype
(
    voertuigtype_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lestype VARCHAR(45) NOT NULL,
    rijbewijs VARCHAR(10) NOT NULL
);
CREATE TABLE werkdag
(
    werkdag INT(11) NOT NULL,
    startdatum DATE NOT NULL,
    eindDatum DATE NOT NULL,
    users_id INT(11) NOT NULL,
    CONSTRAINT `PRIMARY` PRIMARY KEY (werkdag, startdatum),
    CONSTRAINT fk_werkdag_users1 FOREIGN KEY (users_id) REFERENCES users (id)
);
CREATE INDEX fk_werkdag_users1_idx ON werkdag (users_id);
