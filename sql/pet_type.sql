create table public.pet_type
(
    pet_type_id int auto_increment
        primary key,
    pet_type    varchar(50) not null
);

INSERT INTO public.pet_type (pet_type_id, pet_type) VALUES (1, 'dog');
INSERT INTO public.pet_type (pet_type_id, pet_type) VALUES (2, 'cat');
INSERT INTO public.pet_type (pet_type_id, pet_type) VALUES (3, 'rodent');
