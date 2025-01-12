create table public.donation_type
(
    donation_type_id int auto_increment
        primary key,
    donation_type    varchar(50) not null
);

INSERT INTO public.donation_type (donation_type_id, donation_type) VALUES (1, 'monthly');
INSERT INTO public.donation_type (donation_type_id, donation_type) VALUES (2, 'one_off');
INSERT INTO public.donation_type (donation_type_id, donation_type) VALUES (3, 'will');
