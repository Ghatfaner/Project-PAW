drop schema PAW;

create schema PAW;

USE PAW;


create table if not exists User (
    UserId int primary key auto_increment not null ,
    Username varchar(100) not null,
    Email varchar(100) not null,
    Password varchar(12) not null ,
    Address varchar(500) not null ,
    PhoneNumber varchar(15) not null ,
    Occupation varchar(100) not null ,
    UserCreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UserUpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


create table if not exists Genre (
    GenreId int primary key auto_increment not null ,
    GenreName varchar(100) not null
);


create table if not exists MovieCompany(
    CompanyId int primary key auto_increment not null ,
    CompaniesName varchar(200) not null ,
    Established date not null ,
    Address varchar(300) not null ,
    Description text not null
);

create table if not exists Actor (
    ActorId int primary key auto_increment not null ,
    ActorName varchar(200) not null ,
    PlaceOfBirth varchar(100) not null ,
    DateOfBirth date not null ,
    Biography text
);

create table if not exists Director (
    DirectorId int primary key auto_increment not null ,
    DirectorName varchar(200) not null ,
    PlaceOfBirth varchar(100) not null ,
    DateOfBirth date not null ,
    Biography text
);

create table if not exists Movie (
    MovieId int primary key auto_increment not null ,
    CompanyId int ,
    DirectorId int ,
    GenreId int ,
    Title varchar(200) not null ,
    ReleaseDate date not null ,
    Duration time not null ,
    Synopsis TEXT not null ,
    AgeRating varchar(20) not null ,
    Stock int not null ,
    price double not null ,
    foreign key (CompanyId) references MovieCompany(CompanyId),
    foreign key (DirectorId) references Director(DirectorId),
    foreign key (GenreId) references Genre(GenreId)
);


create table if not exists Casting(
    ActorId int,
    MovieId int,
    foreign key (ActorId) references Actor (ActorId),
    foreign key (MovieId) references Movie (MovieId)
);
drop table rent;

create table if not exists Rent (
    RentId int auto_increment primary key not null ,
    UserId int,
    MovieId int,
    Username varchar(100) not null ,
    Address varchar(500) not null ,
    PhoneNumber varchar(15) not null ,
    PaymentMethod varchar(100) not null ,
    Status varchar(20) not null default 'rent',
    RentDate timestamp default current_timestamp,
    ReturnDate timestamp,
    foreign key (UserId) references User(UserId),
    foreign key (MovieId) references Movie(MovieId)
);



create table if not exists Bookmark (
    UserId int,
    MovieId int,
    foreign key (UserId) references User (UserId),
    foreign key (MovieId) references Movie (MovieId)
);

create table if not exists Rate (
    RateID int primary key auto_increment not null ,
    UserId int,
    MovieId int,
    Comment VARCHAR(500) not null ,
    Rating int not null ,
    foreign key (UserId) references User (UserId),
    foreign key (MovieId) references Movie (MovieId)
);


-- DATA DUMMY --
INSERT INTO User (username, email, password, address, phonenumber, occupation)
VALUES
('Milzam', 'milzam@gmail.com', 'milzam', 'Yogyakarta', '08111222', 'lecturer'),
('Ghatfan', 'ghatfan@gmail.com', 'ghatfan', 'Jakarta', '08222333', 'Researchers'),
('Ananda', 'ananda@gmail.com', 'ananda', 'Malang', '08222333', 'college students');

INSERT INTO Genre (GenreName)
VALUES
('Action'),
('Comedy'),
('Animation'),
('Horror'),
('Science Fiction'),
('Documentary');


INSERT INTO MovieCompany (CompaniesName, Established, Address, Description) VALUES
('20th Century Studios', '1935-05-31', 'Los Angeles, California, USA', 'Film studio known for producing a wide range of movies.'),
('Columbia Pictures', '1918-01-10', 'Culver City, California, USA', 'Film studio with a rich history in the entertainment industry.'),
('Comix Wave Films', '2006-11-02', 'Tokyo, Japan', 'Animation film studio renowned for its unique and artistic approach to storytelling.'),
('Dreamworks', '1984-10-12', 'Universal City, California, USA', 'Film studio known for its innovative and high-quality animated and live-action films.'),
('Marvel Studios', '1993-02-02', 'Burbank, California, USA', 'Film production company famous for its superhero film franchises.'),
('Paramount Pictures', '1912-05-08', 'Hollywood, California, USA', 'Iconic film studio contributing to the history of cinema with numerous blockbuster films.'),
('Sony Pictures', '1989-11-07', 'Culver City, California, USA', 'Entertainment company involved in film, television, and digital entertainment.'),
('Universal Studios', '1912-04-30', 'Universal City, California, USA', 'Major film studio with a vast portfolio of successful movies and franchises.'),
('Walt Disney', '1923-10-16', 'Burbank, California, USA', 'Global entertainment conglomerate known for its contributions to animation and theme parks.'),
('Warner Bros', '1923-04-04', 'Burbank, California, USA', 'Entertainment company known for producing and distributing films, television, and music.'),
('Legendary Pictures', '2000-01-01', 'Burbank, California, USA', 'Entertainment company known for producing and distributing films.');


-- Menambahkan data film Avatar
INSERT INTO Director (DirectorName, PlaceOfBirth, DateOfBirth, Biography) VALUES
('James Cameron', 'Kapuskasing, Ontario, Canada', '1954-08-16', 'Canadian filmmaker known for directing blockbuster films like Avatar, Titanic, and The Terminator series.'),
('Shawn Levy', 'Montreal, Quebec, Canada', '1968-07-23', 'Canadian director and producer known for his work on films like Free Guy and the Night at the Museum series.'),
('Ridley Scott', 'South Shields, County Durham, England', '1937-11-30', 'English filmmaker known for directing films like Alien, Blade Runner, and Gladiator.'),
('James Dashner', 'San Francisco, California, USA', '1972-11-26', 'American author and filmmaker best known for The Maze Runner series.'),
('Makoto Shinkai', 'Koumi, Nagano, Japan', '1973-02-09', 'Japanese director and animator known for works like Your Name. and Weathering With You.'),
('Jennifer Yuh Nelson', 'Seoul, South Korea', '1972-05-07', 'South Korean-born director known for directing animated films like Kung Fu Panda 2 and The Darkest Minds.'),
('Christopher Nolan', 'Westminster, London, England', '1970-07-30', 'English filmmaker known for directing films like Inception, The Dark Knight trilogy, and Interstellar.'),
('Christopher McQuarrie', 'Princeton, New Jersey, USA', '1968-06-25', 'American director, producer, and screenwriter known for his work on Mission Impossible films.'),
('Marc Forster', 'Illertissen, Bavaria, Germany', '1969-11-30', 'German-Swiss filmmaker known for directing World War Z and Finding Neverland.'),
('John Krasinski', 'Newton, Massachusetts, USA', '1979-10-20', 'American actor, director, and writer known for directing A Quiet Place.'),
('David Leitch', 'Košice, Czechoslovakia (now Slovakia)', '1970-11-16', 'American filmmaker and stuntman known for directing Deadpool 2 and Hobbs & Shaw.'),
('David Fincher', 'Denver, Colorado, USA', '1962-08-28', 'American director known for films like Fight Club, The Social Network, and Gone Girl.'),
('James Wan', 'Kuching, Sarawak, Malaysia', '1977-02-26', 'Malaysian-Australian filmmaker known for directing horror films like Insidious and The Conjuring.'),
('Paul W.S. Anderson', 'Newcastle upon Tyne, England', '1965-03-04', 'English director known for directing films like Resident Evil and Mortal Kombat.'),
('Justin Lin', 'Taipei, Taiwan', '1971-10-11', 'Taiwanese-American director known for directing Fast & Furious films and Star Trek Beyond.'),
('Pierre Coffin', 'Arras, France', '1967-03-15', 'French animator and director known for co-directing the Despicable Me series and Minions.'),
('Jason Moore', 'Frankfurt, Germany', '1970-10-22', 'American director known for films like Pitch Perfect and Sisters.'),
('Colin Trevorrow', 'San Francisco, California, USA', '1976-09-13', 'American director known for directing Jurassic World and Safety Not Guaranteed.'),
('Brad Bird', 'Kalispell, Montana, USA', '1957-09-24', 'American director known for animated films like The Incredibles and Ratatouille.'),
('Andrew Stanton', 'Rockport, Massachusetts, USA', '1965-12-03', 'American director known for animated films like Finding Nemo and WALL-E.'),
('Roger Allers', 'Rye, New York, USA', '1949-06-29', 'American film director known for co-directing The Lion King.'),
('Denis Villeneuve', 'Trois-Rivières, Quebec, Canada', '1967-10-03', 'Canadian filmmaker known for directing films like Arrival, Blade Runner 2049, and Dune.'),
('Rob Letterman', 'Cleveland, Ohio, USA', '1970-10-30', 'American film director known for directing Pokémon: Detective Pikachu.'),
('Steven Spielberg', 'Cincinnati, Ohio, USA', '1946-12-18', 'American filmmaker known for directing films like E.T., Jurassic Park, and Saving Private Ryan.'),
('Rich Moore', 'Oxnard, California, USA', '1963-05-10', 'American animation director known for directing films like Wreck-It Ralph and Zootopia.'),
('Chris Williams', 'Missouri, USA', '1968-11-23', 'American animator and director known for co-directing films like Big Hero 6 and Bolt.'),
('Ryan Coogler', 'Oakland, California, USA', '1986-05-23', 'American film director, producer, and screenwriter. Best known for directing Fruitvale Station, Creed, and Black Panther.'),
('James Gunn', 'St. Louis, Missouri, USA', '1966-08-05', 'American filmmaker, actor, and screenwriter. Best known for directing Guardians of the Galaxy and its sequel, as well as writing and directing The Suicide Squad.'),
('Jon Watts', 'Fountain, Colorado, USA', '1981-06-28', 'American film director, producer, and screenwriter. Best known for directing the Marvel Cinematic Universe films Spider-Man: Homecoming and Spider-Man: Far From Home.'),
('Anthony Russo', 'Cleveland, Ohio, USA', '1970-02-03', 'American film and television director. Best known for directing several Marvel Cinematic Universe films, including Captain America: The Winter Soldier and Avengers: Endgame.'),
('Peter Ramsey', 'Cibolo, Texas, USA', '1962-02-05', 'American film director, animator, and illustrator. Best known for co-directing the animated film Spider-Man: Into the Spider-Verse.'),
('Marc Webb', 'Bloomington, Indiana, USA', '1974-08-31', 'American music video, film, and television director. Best known for directing (500) Days of Summer and The Amazing Spider-Man series.'),
('Roland Emmerich', 'Stuttgart, West Germany', '1955-11-10', 'German film director known for directing disaster films like Independence Day and 2012.'),
('Stanley Kubrick', 'New York City, New York, USA', '1928-07-26', 'American film director known for classics like 2001: A Space Odyssey and A Clockwork Orange.'),
('Wes Ball', 'Arlington, Texas, USA', '1980-10-28', 'American film director known for directing The Maze Runner trilogy and Mouse Guard.'),
('Robert Rodriguez', 'San Antonio, Texas, USA', '1968-06-20', 'American filmmaker known for directing films like Sin City, Desperado, and Spy Kids.'),
('Michael Bay', 'Los Angeles, California, USA', '1965-02-17', 'American filmmaker known for his work on high-budget action films and blockbusters, including the Transformers series, Armageddon, and Bad Boys. Michael Bay was born on February 17, 1965, in Los Angeles, California.'),
('Jon Favreau', 'Flushing, Queens, New York, USA', '1966-10-19', 'American actor, director, producer, and screenwriter. Jon Favreau is known for his work on films such as Iron Man, The Jungle Book, and The Lion King. He was born on October 19, 1966, in Flushing, Queens, New York.'),
('Dean DeBlois', 'Aylmer, Quebec, Canada', '1970-06-07', 'Canadian film director, producer, and screenwriter known for his work on animated films, particularly the How to Train Your Dragon trilogy. Dean DeBlois was born on June 7, 1970, in Aylmer, Quebec, Canada.'),
('Gabriele Muccino', 'Rome, Italy', '1967-05-20', 'Italian film director and screenwriter known for his work on films like The Pursuit of Happyness and Seven Pounds. Gabriele Muccino was born on May 20, 1967, in Rome, Italy.'),
('John Lasseter', 'Hollywood, California, USA', '1957-01-12', 'American animator and filmmaker known for co-founding Pixar Animation Studios and directing films like Toy Story and Cars. John Lasseter was born on January 12, 1957, in Hollywood, California.'),
('Lee Unkrich', 'Cleveland, Ohio, USA', '1967-08-08', 'American director and editor known for his work at Pixar, including directing Toy Story 3 and co-directing Toy Story 2. Lee Unkrich was born on August 8, 1967, in Cleveland, Ohio.'),
('Pete Docter', 'Bloomington, Minnesota, USA', '1968-10-09', 'American animator, film director, and producer known for directing Monsters, Inc., Up, and Inside Out. Pete Docter was born on October 9, 1968, in Bloomington, Minnesota.'),
('Joseph Kosinski', 'Marshalltown, Iowa, USA', '1974-05-03', 'American film director known for his work on films like Tron: Legacy and Oblivion. Joseph Kosinski was born on May 3, 1974, in Marshalltown, Iowa.');


INSERT INTO Movie (CompanyId, DirectorId, GenreId, Title, ReleaseDate, Duration, Synopsis, AgeRating, Stock, price) VALUES
(1, 1, 1, 'Avatar', '2009-12-18', '2:42:00', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'PG-13', 10, 19.99),
(1, 2, 2, 'Free Guy', '2021-08-13', '1:55:00', 'A bank teller discovers that he\'s actually an NPC inside a brutal, open-world video game.', 'PG-13', 10, 14.99),
(1, 3, 5, 'The Martian', '2015-10-02', '2:24:00', 'An astronaut becomes stranded on Mars after his team assumes him dead, and must rely on his ingenuity to find a way to signal to Earth that he is alive.', 'PG-13', 10, 19.99),
(1,33, 5, 'Independence Day', '1996-07-03', '2:25:00', 'The aliens are coming, and their goal is to invade and destroy Earth. Fighting superior technology, mankind\'s best weapon is the will to survive.', 'PG-13', 10, 19.99),
(1,36, 5, 'Alita: Battle Angel', '2019-02-14', '2:02:00', 'A deactivated cyborg is revived, but she has no memory of her past life and goes on a quest to find out who she is.', 'PG-13', 10, 19.99),
(1,35, 5, 'The Maze Runner', '2014-09-19', '1:53:00', 'Thomas wakes up in a maze with a group of other boys and must find a way out while piecing together his past.', 'PG-13', 10, 14.99),
(2, 3, 6, 'Napoleon', '2023-11-29', '2:38:00', 'A documentary about the life and career of Napoleon Bonaparte.', 'R', 10, 19.99),
(2,40, 6, 'The Pursuit Of Happyness', '2006-12-15', '1:57:00', 'A documentary exploring the concept and pursuit of happiness in various aspects of life.', 'PG-13', 10, 14.99),
(3, 5, 3, 'Suzume', '2023-03-8', '2:02:00', 'An animated film about the adventures of Suzume, a charming and whimsical character.', 'PG', 10, 19.99),
(3, 5, 3, 'Your Name.', '2016-08-26', '1:46:00', 'Two teenagers find themselves inexplicably linked through their dreams and embark on a quest to unravel the mystery behind their connection.', 'PG', 10, 14.99),
(3, 5, 3, 'Weathering With You', '2019-07-19', '1:54:00', 'A high school boy runs away to Tokyo and befriends a girl with the ability to control the weather.', 'PG-13', 10, 14.99),
(4, 6, 3, 'Kung Fu Panda', '2008-06-06', '1:32:00', 'A clumsy panda becomes a kung fu master and must save his village from an evil snow leopard with the help of his friends.', 'PG', 10, 14.99),
(4,39, 3, 'How To Train Your Dragon', '2010-03-26', '1:38:00', 'A young Viking befriends and trains a dragon, challenging the traditions of his tribe.', 'PG', 10, 14.99),
(5,38, 1, 'Iron Man', '2008-05-02', '2:06:00', 'Tony Stark, an industrialist and genius inventor, builds a powered suit and becomes the technologically advanced superhero Iron Man.', 'PG-13', 10, 19.99),
(5, 30, 1, 'Avengers: Infinity War', '2018-04-27', '2:29:00', 'The Avengers and their allies must be willing to sacrifice everything in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 'PG-13', 10, 19.99),
(5, 29, 1, 'Spider-Man: No Way Home', '2021-12-17', '2:28:00', 'Spider-Man teams up with his counterparts from other dimensions to stop a powerful threat that could destroy all of reality.', 'PG-13', 10, 19.99),
(5, 27, 1, 'Black Panther', '2018-02-16', '2:14:00', 'T\'Challa, the heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and confront a challenger from his country\'s past.', 'PG-13', 10, 19.99),
(5, 28, 1, 'Guardians Of The Galaxy', '2014-08-01', '2:01:00', 'A group of intergalactic misfits comes together to form the Guardians of the Galaxy and protect a powerful orb from falling into the hands of a villain.', 'PG-13', 10, 19.99),
(6, 44, 1, 'Top Gun: Maverick', '2022-05-27', '2:10:00', 'Maverick, now a flight instructor, guides the next generation of fighter pilots as they face new challenges in a rapidly evolving world of drone warfare.', 'PG-13', 10, 19.99),
(6,37, 1, 'Transformers: Age Of Extinction', '2014-06-27', '2:45:00', 'Optimus Prime and his Autobots must rise to face a new threat from the Decepticons and a bounty hunter sent by the creators of the Transformers.', 'PG-13', 10, 19.99),
(6,8, 1, 'Mission Impossible - Fallout', '2018-07-25', '1:50:00', 'Ethan Hunt and his team must stop a renegade agent who has stolen a deadly chemical weapon.', 'PG-13', 10, 14.99),
(6, 1, 6, 'Titanic', '1997-12-19', '3:14:00', 'A fictionalized account of the sinking of the RMS Titanic, focusing on the romance between two passengers.', 'PG-13', 10, 24.99),
(6, 9, 4, 'World War Z', '2013-06-21', '2:03:00', 'A former United Nations investigator is tasked with finding the source of a global zombie pandemic and developing a way to stop it.', 'PG-13', 10, 19.99),
(6, 10, 4, 'A Quiet Place', '2018-04-06', '1:30:00', 'In a post-apocalyptic world, a family must live in silence to avoid mysterious creatures that hunt by sound.', 'PG-13', 10, 14.99),
(6, 7, 5, 'Interstellar', '2014-11-07', '2:49:00', 'A group of explorers embarks on a space journey through a wormhole in search of a new habitable planet for humanity.', 'PG-13', 10, 19.99),
(7, 32, 1, 'The Amazing Spider-Man', '2012-07-03', '2:16:00', 'Peter Parker, a high school student, becomes the superhero Spider-Man and must confront a new threat while dealing with his personal life.', 'PG-13', 10, 19.99),
(7, 31, 3, 'Spider-Man: Into The Spider-Verse', '2018-12-14', '1:57:00', 'Miles Morales, a teenager with spider-like abilities, joins a group of Spider-People from different dimensions to stop a threat to all reality.', 'PG', 10, 14.99),
(7, 11, 2, 'Bullet Train', '2022-08-10', '2:06:00', 'Assassins with conflicting missions board a high-speed train, leading to a chaotic and comedic journey.', 'R', 10, 19.99),
(7, 12, 6, 'The Social Network', '2010-10-01', '2:00:00', 'The story of the founding of Facebook and the legal battles that followed among its founders.', 'PG-13', 10, 19.99),
(7, 13, 4, 'Insidious', '2011-04-01', '1:43:00', 'A family discovers that their new home is haunted, and their son falls into a mysterious coma, leading to a series of supernatural events.', 'PG-13', 10, 14.99),
(7, 14, 4, 'Resident Evil', '2002-03-15', '1:40:00', 'A special military unit must stop a powerful, out-of-control supercomputer and the hordes of undead it creates.', 'R', 10, 14.99),
(8, 15, 1, 'Fast X', '2023-05-17', '2:21:00', 'The Fast and Furious crew faces new challenges and adversaries in their high-stakes world of fast cars and international intrigue.', 'PG-13', 10, 19.99),
(8, 16, 3, 'Minions', '2015-07-10', '1:31:00', 'The origin story of the Minions, small yellow creatures who serve history\'s most despicable masters.', 'PG', 10, 14.99),
(8, 17, 2, 'Pitch Perfect', '2012-09-28', '1:52:00', 'Beca, a college freshman, joins an a cappella group and helps them compete against their rivals in a national singing competition.', 'PG-13', 10, 14.99),
(8, 7, 6, 'Oppenheimer', '2023-07-19', '3:00:00', 'A documentary exploring the life and work of J. Robert Oppenheimer, the scientist known as the father of the atomic bomb.', 'R', 10, 24.99),
(8, 18, 5, 'Jurassic World', '2015-06-12', '2:04:00', 'A new theme park featuring genetically-engineered dinosaurs becomes a deadly attraction when the creatures break loose.', 'PG-13', 10, 19.99),
(9, 26, 3, 'Big Hero Six', '2014-11-07', '1:42:00', 'A young robotics prodigy and his inflatable healthcare companion form a superhero team to combat a mysterious villain in the futuristic city of San Fransokyo.', 'PG', 10, 14.99),
(9, 25, 3, 'Wreck It Ralph', '2012-11-02', '1:41:00', 'A video game villain decides he wants to be a hero and sets out to fulfill his dream, leading to unexpected adventures.', 'PG', 10, 14.99),
(9,41, 3, 'Cars', '2006-06-09', '1:56:00', 'A race car that learns the importance of slowing down and enjoying the journey finds himself in a small town on Route 66.', 'G', 10, 14.99),
(9,42, 3, 'Toy Story 3', '2010-06-18', '1:43:00', 'Woody, Buzz Lightyear, and the other toys face an uncertain future as their owner, Andy, prepares to leave for college.', 'G', 10, 14.99),
(9,43, 3, 'Up', '2009-05-29', '1:36:00', 'An elderly man named Carl sets out on an adventure to South America with a young boy, using helium balloons to fly his house.', 'PG', 10, 14.99),
(9, 19, 3, 'Ratatouille', '2007-06-29', '1:51:00', 'A rat named Remy aspires to become a great chef and forms an unlikely partnership with a human chef in a Parisian restaurant.', 'G', 10, 14.99),
(9, 21, 3, 'The Lion King', '1994-06-15', '1:28:00', 'Simba, a young lion cub, embarks on a journey to reclaim his throne as the rightful king of the Pride Lands after the murder of his father, Mufasa.', 'G', 10, 14.99),
(9, 19, 5, 'Tomorrowland', '2015-05-22', '2:10:00', 'A teenage girl and a former boy-genius inventor set out on a mission to unearth the secrets of a place somewhere in time and space that exists in their collective memory as "Tomorrowland."', 'PG', 10, 19.99),
(11, 22, 1, 'Dune', '2021-10-22', '2:35:00', 'A young noble named Paul Atreides must navigate political intrigue and dangerous environments on the desert planet Arrakis to secure the valuable spice melange.', 'PG-13', 10, 19.99),
(10, 7, 1, 'The Dark Knight', '2008-07-18', '2:32:00', 'Batman faces the Joker, a criminal mastermind who seeks to create chaos and anarchy in Gotham City.', 'PG-13', 10, 19.99),
(10, 22, 1, 'Blade Runner 2049', '2017-10-06', '2:44:00', 'Officer K, a blade runner, uncovers a long-buried secret that has the potential to plunge what\'s left of society into chaos. His discovery leads him on a quest to find Rick Deckard, a former blade runner.', 'R', 10, 19.99),
(10, 23, 2, 'Pokémon: Detective Pikachu', '2019-05-10', '1:44:00', 'In a world where people collect Pokémon to do battle, a young man teams up with a wise-cracking Pikachu to solve the mystery of his missing father.', 'PG', 10, 14.99),
(10, 7, 5, 'Inception', '2010-07-16', '2:28:00', 'A skilled thief enters the dreams of others to steal their deepest secrets. However, he is tasked with planting an idea into someone\'s mind, a task that proves to be more challenging.', 'PG-13', 10, 19.99),
(10, 24, 5, 'Ready Player One', '2018-03-29', '2:20:00', 'In a dystopian future, people escape their reality by entering the OASIS, a virtual reality universe. A young man discovers a hidden Easter egg in the OASIS, leading to a high-stakes treasure hunt.', 'PG-13', 10, 19.99);

INSERT INTO movie (CompanyId, DirectorId, GenreId, Title, ReleaseDate, Duration, Synopsis, AgeRating, Stock, price)
VALUES (7, 31, 3, 'Spiderman: Across the Spider-Verse', '2023', 'TBD', 'Miles Morales faces new challenges as he traverses the Spider-Verse, encountering new threats and meeting different versions of Spider-Man from alternate realities. Together, they must collaborate to overcome a menace that threatens the entire multiverse.', 'PG-13', 0, 0.0),
       (11, 22, 1, 'Dune 2', '2023', 'TBD', 'The saga continues as the noble houses navigate the treacherous desert planet of Arrakis, battling for control of the valuable spice melange. New alliances are formed, betrayals unfold, and the fate of Arrakis hangs in the balance.', 'PG-13', 0, 0.0),
       (1, 35, 5, 'Kingdom of the Planet of the Apes', '2024', 'TBD', 'In a world where apes have evolved into intelligent beings, a new kingdom emerges as they face internal and external challenges. The delicate balance between humans and apes is at stake as they navigate political intrigue and the struggle for survival.', 'PG-13', 0, 0.0);



INSERT INTO Actor (ActorName, PlaceOfBirth, DateOfBirth, Biography) VALUES
('Sam Worthington', 'Godalming, Surrey, England', '1976-08-02', 'English-Australian actor best known for his role in Avatar.'),
('Ryan Reynolds', 'Vancouver, British Columbia, Canada', '1976-10-23', 'Canadian actor and producer known for his roles in Deadpool and The Proposal.'),
('Matt Damon', 'Cambridge, Massachusetts, USA', '1970-10-08', 'American actor, producer, and screenwriter known for his work in the Bourne series and Good Will Hunting.'),
('Will Smith', 'Philadelphia, Pennsylvania, USA', '1968-09-25', 'American actor, producer, and rapper known for his roles in Men in Black and The Pursuit of Happyness.'),
('Rosa Salazar', 'Washington, D.C., USA', '1985-07-16', 'American actress known for her role in Alita: Battle Angel.'),
('Dylan O''Brien', 'New York City, New York, USA', '1991-08-26', 'American actor known for his role in The Maze Runner series.'),
('Ian Holm', 'Goodmayes, Essex, England', '1931-09-12', 'English actor known for his roles in The Lord of the Rings and Alien.'),
('Ryunosuke Kamiki', 'Saitama, Japan', '1993-05-19', 'Japanese actor known for his roles in anime and live-action films.'),
('Nana Mori', 'Osaka, Japan', '1999-10-23', 'Japanese actress known for her roles in Weathering With You and Diner.'),
('Jack Black', 'Santa Monica, California, USA', '1969-08-28', 'American actor, comedian, and musician known for his roles in School of Rock and Kung Fu Panda.'),
('Jay Baruchel', 'Ottawa, Ontario, Canada', '1982-04-09', 'Canadian actor known for his roles in Tropic Thunder and How to Train Your Dragon.'),
('Robert Downey Jr.', 'New York City, New York, USA', '1965-04-04', 'American actor known for his role as Iron Man in the Marvel Cinematic Universe.'),
('Chris Hemsworth', 'Melbourne, Victoria, Australia', '1983-08-11', 'Australian actor known for his role as Thor in the Marvel Cinematic Universe.'),
('Tom Holland', 'Kingston upon Thames, London, England', '1996-06-01', 'English actor known for playing Spider-Man in the Marvel Cinematic Universe.'),
('Chadwick Boseman', 'Anderson, South Carolina, USA', '1976-11-29', 'American actor known for his role as Black Panther in the Marvel Cinematic Universe.'),
('Zoe Saldana', 'Passaic, New Jersey, USA', '1978-06-19', 'American actress known for her roles in Avatar and Guardians of the Galaxy.'),
('Tom Cruise', 'Syracuse, New York, USA', '1962-07-03', 'American actor known for his roles in Top Gun and Mission: Impossible series.'),
('Mark Wahlberg', 'Dorchester, Boston, Massachusetts, USA', '1971-06-05', 'American actor and producer known for his roles in The Departed and The Fighter.'),
('Leonardo DiCaprio', 'Los Angeles, California, USA', '1974-11-11', 'American actor and environmental activist known for his roles in Titanic and The Revenant.'),
('Brad Pitt', 'Shawnee, Oklahoma, USA', '1963-12-18', 'American actor and film producer known for his roles in Fight Club and Once Upon a Time in Hollywood.'),
('Emily Blunt', 'Roehampton, London, England', '1983-02-23', 'English actress known for her roles in The Devil Wears Prada and A Quiet Place.'),
('Matthew McConaughey', 'Uvalde, Texas, USA', '1969-11-04', 'American actor known for his roles in Dallas Buyers Club and Interstellar.'),
('Andrew Garfield', 'Los Angeles, California, USA', '1983-08-20', 'American-British actor known for his roles in The Social Network and The Amazing Spider-Man series.'),
('Shameik Moore', 'Atlanta, Georgia, USA', '1995-05-04', 'American actor and rapper known for his voice role as Miles Morales in Spider-Man: Into the Spider-Verse.'),
('Jesse Eisenberg', 'Queens, New York, USA', '1983-10-05', 'American actor known for his roles in The Social Network and Zombieland.'),
('Patrick Wilson', 'Norfolk, Virginia, USA', '1973-07-03', 'American actor known for his roles in Insidious and The Conjuring series.'),
('Milla Jovovich', 'Kiev, Ukrainian SSR, Soviet Union', '1975-12-17', 'Ukrainian-American actress and model known for her role in the Resident Evil series.'),
('Vin Diesel', 'Alameda County, California, USA', '1967-07-18', 'American actor and filmmaker known for his roles in the Fast & Furious series and voice of Groot in Guardians of the Galaxy.'),
('Pierre Coffin', 'France', '1967-03-15', 'French animator, film director, and voice actor known for co-directing the Despicable Me series and voicing the Minions.'),
('Anna Kendrick', 'Portland, Maine, USA', '1985-08-09', 'American actress and singer known for her roles in Pitch Perfect and Up in the Air.'),
('Cillian Murphy', 'Douglas, Cork, Ireland', '1976-05-25', 'Irish actor known for his roles in Inception and The Dark Knight trilogy.'),
('Chris Pratt', 'Virginia, Minnesota, USA', '1979-06-21', 'American actor known for his roles in Guardians of the Galaxy and Jurassic World series.'),
('Ryan Potter', 'Portland, Oregon, USA', '1995-09-12', 'American actor and martial artist known for his voice role as Hiro in Big Hero 6.'),
('John C. Reilly', 'Chicago, Illinois, USA', '1965-05-24', 'American actor and comedian known for his roles in Wreck-It Ralph and Step Brothers.'),
('Owen Wilson', 'Dallas, Texas, USA', '1968-11-18', 'American actor known for his roles in Cars and Zoolander.'),
('Tom Hanks', 'Concord, California, USA', '1956-07-09', 'American actor and filmmaker known for his roles in Forrest Gump and Toy Story series.'),
('Ed Asner', 'Kansas City, Missouri, USA', '1929-11-15', 'American actor and voice actor known for his role in Up and The Mary Tyler Moore Show.'),
('Patton Oswalt', 'Portsmouth, Virginia, USA', '1969-01-27', 'American stand-up comedian, actor, and voice actor known for his role in Ratatouille.'),
('Donald Glover', 'Edwards Air Force Base, California, USA', '1983-09-25', 'American actor, singer, and comedian known for his roles in Community and Atlanta, as well as for his musical work under the stage name Childish Gambino.'),
('George Clooney', 'Lexington, Kentucky, USA', '1961-05-06', 'American actor, filmmaker, and philanthropist known for his roles in Ocean''s Eleven and Gravity.'),
('Timothée Chalamet', 'New York City, New York, USA', '1995-12-27', 'American actor known for his roles in Call Me by Your Name and Dune.'),
('Christian Bale', 'Haverfordwest, Pembrokeshire, Wales', '1974-01-30', 'English actor known for his roles in The Dark Knight trilogy and American Psycho.'),
('Ryan Gosling', 'London, Ontario, Canada', '1980-11-12', 'Canadian actor known for his roles in La La Land and Blade Runner 2049.'),
('Tye Sheridan', 'Elkhart, Texas, USA', '1996-11-11', 'American actor known for his roles in Mud and Ready Player One.');


INSERT INTO Casting (ActorId, MovieId) VALUES
-- Avatar
(1, 1),
-- Free Guy
(2, 2),
-- The Martian
(3, 3),
-- Independence Day
(4, 4),
-- Alita: Battle Angel
(5, 5),
-- The Maze Runner
(6, 6),
-- Napoleon
(7, 7),
-- The Pursuit Of Happyness
(4, 8),
-- Suzume
(8, 9),
-- Your Name.
(8, 10),
-- Weathering With You
(9, 11),
-- Kung Fu Panda
(10, 12),
-- How To Train Your Dragon
(11, 13),
-- Iron Man
(12, 14),
-- Avengers: Infinity War
(13, 15),
-- Spider-Man: No Way Home
(14, 16),
-- Black Panther
(15, 17),
-- Guardians Of The Galaxy
(16, 18),
-- Top Gun: Maverick
(17, 19),
-- Transformers: Age Of Extinction
(18, 20),
-- Mission Impossible - Fallout
(17, 21),
-- Titanic
(19, 22),
-- World War Z
(20, 23),
-- A Quiet Place
(21, 24),
-- Interstellar
(22, 25),
-- The Amazing Spider-Man
(23, 26),
-- Spider-Man: Into The Spider-Verse
(24, 27),
-- Bullet Train
(20, 28),
-- The Social Network
(25, 29),
-- Insidious
(26, 30),
-- Resident Evil
(27, 31),
-- Fast X
(28, 32),
-- Minions
(29, 33),
-- Pitch Perfect
(30, 34),
-- Oppenheimer
(31, 35),
-- Jurassic World
(32, 36),
-- Big Hero Six
(33, 37),
-- Wreck It Ralph
(34, 38),
-- Cars
(35, 39),
-- Toy Story 3
(36, 40),
-- Up
(37, 41),
-- Ratatouille
(38, 42),
-- The Lion King
(39, 43),
-- Tomorrowland
(40, 44),
-- Dune
(41, 45),
-- The Dark Knight
(42, 46),
-- Blade Runner 2049
(43, 47),
-- Pokémon: Detective Pikachu
(2, 48),
-- Inception
(19, 49),
-- Ready Player One
(44, 50);


insert into bookmark (UserId, MovieId) values
(1, 45),
(1, 47),
(1, 50),
(1, 28),
(2, 27),
(2, 29),
(2, 35),
(3, 33),
(3, 41);