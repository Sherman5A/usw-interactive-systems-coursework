create table db_23056792.pet
(
    pet_id          int auto_increment
        primary key,
    pet_type_id     int          not null,
    pet_name        varchar(50)  null,
    pet_description text         not null,
    previous_owners int          null,
    pet_weight      float        not null,
    pet_colour      varchar(20)  not null,
    image_path      varchar(500) null,
    constraint pet_type__fk
        foreign key (pet_type_id) references pet_type (pet_type_id)
            on update cascade
);

INSERT INTO db_23056792.pet (pet_id, pet_type_id, pet_name, pet_description, previous_owners, pet_weight, pet_colour, image_path) VALUES (1, 1, 'gwen', 'A small lapdog. Very laid-back. Previous owner moved abroad and was unable to keep him.', 1, 5, 'white', 'gwen.jpg');
INSERT INTO db_23056792.pet (pet_id, pet_type_id, pet_name, pet_description, previous_owners, pet_weight, pet_colour, image_path) VALUES (2, 2, 'sid', 'Very old cat. Sid sleeps for most of the day. She has been loved for many years. Previous owners died of old age.', 1, 4, 'amber', 'sid.jpg');
INSERT INTO db_23056792.pet (pet_id, pet_type_id, pet_name, pet_description, previous_owners, pet_weight, pet_colour, image_path) VALUES (3, 1, 'lulu', 'Lulu requires a fair bit of attention and walking, otherwise she can cause trouble. She\'s had several families that could not meet her requirements. Any family adopting her should be dedicating to loving her.', 4, 10, 'brown', 'lulu.jpg');
INSERT INTO db_23056792.pet (pet_id, pet_type_id, pet_name, pet_description, previous_owners, pet_weight, pet_colour, image_path) VALUES (4, 3, 'stuart little', 'Stuart Little is a small mouse. Beware, Mice are nocturnal and they can smell.', 2, 0.04, 'white', 'stuart-little.jpg');
