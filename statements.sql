create database campingvillage;

create table Medewerker(
    MedewerkerID int not null auto_increment,
    Voornaam varchar(255),
    Achternaam varchar(255),
    Gebruikersnaam varchar(255),
    Wachtwoord varchar(255),
    primary key (MedewerkerID)
);

create table Reservering (
    ReserveringID int not null auto_increment,
    Voornaam varchar(255),
    tussenvoegsels varchar(255),
    Achternaam varchar(255),
    Email varchar(255),
    TelefoonNummer int,
    Periode varchar(255),
    primary key (ReserveringID)
);

create table Activiteiten(
    ActiviteitenID int not null auto_increment,
    Voornaam varchar(255),
    Achternaam varchar(255),
    Activiteit varchar(255),
    primary key (ActiviteitenID)
);