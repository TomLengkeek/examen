create table Status(
	id int auto_increment not null,
    description nvarchar(50) not null,
    primary key(id)
);
create table Instructeur(
	id int auto_increment not null,
    voornaam nvarchar(100) not null,
    achternaam nvarchar(100) not null,
    woonplaats nvarchar(100) not null,
    telefoonnummer nvarchar(15) not null,
    status nvarchar(50) not null,
    dateCreated datetime not null,
    dateUpdated timestamp,
    
	PRIMARY KEY (id),
    FOREIGN KEY (status) REFERENCES Status(description)
 );
insert into Status (description) VALUES ("ziek"), ("beschikbaar"), ("werkend"), ("op vakantie"), ("verlof");
 
insert into Instructeur (voornaam,achternaam,woonplaats,telefoonnummer,status,dateCreated) 
VALUES 
("piet","van het hek", "Utrecht", "+31612345678","ziek", CURRENT_TIMESTAMP), 
("jan","de man", "Amsterdam", "+31612145678","beschikbaar", CURRENT_TIMESTAMP),
("kees","t kaasje", "Den haag", "+316121235678","werkend", CURRENT_TIMESTAMP),
("ahmed","el medoui", "Groningen", "+31612145397","op vakantie", CURRENT_TIMESTAMP),
("Tim","de timmer", "Vlissingen", "+3161209678","verlof", CURRENT_TIMESTAMP),
("Susanna","de vrouw", "Amsterdam", "+31609145678","beschikbaar", CURRENT_TIMESTAMP),
("Sandra","van het spek", "Utrecht", "+31612145617","werkend", CURRENT_TIMESTAMP),
("Henrie","koe", "Zwolle", "+31612145678","ziek", CURRENT_TIMESTAMP);