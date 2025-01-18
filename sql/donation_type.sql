create table db_23056792.donation_type
(
    donation_type_id int auto_increment
        primary key,
    donation_type    varchar(50) not null
);

INSERT INTO db_23056792.donation_type (donation_type_id, donation_type) VALUES (1, 'monthly');
INSERT INTO db_23056792.donation_type (donation_type_id, donation_type) VALUES (2, 'one_off');
INSERT INTO db_23056792.donation_type (donation_type_id, donation_type) VALUES (3, 'will');
