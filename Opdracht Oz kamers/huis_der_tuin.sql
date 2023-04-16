create database huis_der_tuin;

create table klant (
	klantnummer INT auto_increment,
    naam varchar(255),
    adres varchar(255),
    plaats varchar(255),
    postcode varchar(255),
    telefoon INT,
    PRIMARY KEY(klantnummer)
);
create table kamer (
	kamernummer INT auto_increment,
    PRIMARY KEY(kamernummer)
);
create table reservering (
	reserveringsnummer INT auto_increment,
    van DATE,
    tot DATE,
    kamernummer INT,
    klantnummer INT,
    foreign key (kamernummer) REFERENCES kamer(kamernummer) ON DELETE CASCADE,
	foreign key (klantnummer) REFERENCES klant(klantnummer) ON DELETE CASCADE,
    PRIMARY KEY(reserveringsnummer)
);
create table reserveringsoverzicht(
	overzichtID INT auto_increment,
    reserveringsnummer INT,
    PRIMARY KEY(overzichtID),
    foreign key (reserveringsnummer) REFERENCES reservering(reserveringsnummer)
);
create table medewerker(
	medewerkerID int auto_increment,
	username varchar(255) not null unique,
    password varchar(255) not null,
    PRIMARY KEY(medewerkerID)
);
select * from medewerker;
insert into kamer values(5);
