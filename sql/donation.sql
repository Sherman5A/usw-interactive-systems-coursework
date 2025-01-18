create table db_23056792.donation
(
    donation_id      int auto_increment
        primary key,
    donation_type_id int            not null,
    donator_name     varchar(50)    not null,
    donation_email   text           not null,
    donation_amount  decimal(12, 2) not null,
    donation_message varchar(200)   null,
    comm_preference  varchar(40)    null,
    show_billboard   tinyint(1)     not null,
    constraint donation_donation_type__fk
        foreign key (donation_type_id) references donation_type (donation_type_id)
            on update cascade
);

INSERT INTO db_23056792.donation (donation_id, donation_type_id, donator_name, donation_email, donation_amount, donation_message, comm_preference, show_billboard) VALUES (1, 1, 'Jeff Chaplan', 'jimkeller@gmail.com', 5.00, 'Here\'s to the pets!', 'email', 1);
INSERT INTO db_23056792.donation (donation_id, donation_type_id, donator_name, donation_email, donation_amount, donation_message, comm_preference, show_billboard) VALUES (2, 2, 'Joseph Lewis', 'josephlewis@hotmail.com', 20.01, 'Hope this money helps', 'email', 1);
INSERT INTO db_23056792.donation (donation_id, donation_type_id, donator_name, donation_email, donation_amount, donation_message, comm_preference, show_billboard) VALUES (3, 2, 'Alun Davies', 'alundavies@outlook.com', 19.12, 'Had some spare change, here!', 'email', 1);
INSERT INTO db_23056792.donation (donation_id, donation_type_id, donator_name, donation_email, donation_amount, donation_message, comm_preference, show_billboard) VALUES (4, 1, 'Aubrey Old', 'aubrey1000@gmail.com', 1000.00, 'Here\'s some of my will', 'phone', 1);
INSERT INTO db_23056792.donation (donation_id, donation_type_id, donator_name, donation_email, donation_amount, donation_message, comm_preference, show_billboard) VALUES (5, 2, 'John Davies', 'john-davies@tiscali.co.uk', 0.05, 'Here\'s a bob', 'phone', 1);
INSERT INTO db_23056792.donation (donation_id, donation_type_id, donator_name, donation_email, donation_amount, donation_message, comm_preference, show_billboard) VALUES (6, 2, 'Rhys Williams', 'rhyswilliams@faw.co.uk', 1.20, 'Some extra money', 'newsletter', 1);
