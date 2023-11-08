DROP DATABASE IF EXISTS loridb;

CREATE DATABASE loridb;

USE loridb;

-- Set up of tables -------------------------------------------->

CREATE TABLE users (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE permission (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id int(11) NOT NULL,
    page_num int(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE journal_page (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    section_type varchar(30) NOT NULL,
    section_name varchar(50) NOT NULL,
    order_num int(11) NOT NULL,
    page_num int(11) NOT NULL
);

CREATE TABLE heading (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    heading_content TEXT NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

CREATE TABLE subheading (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    subheading_content TEXT NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

CREATE TABLE quote (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    quote_content TEXT NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

CREATE TABLE byline (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    byline_content TEXT NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

CREATE TABLE story_box (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    story_box_userdata_name varchar(100) NOT NULL,
    placeholder_text TEXT NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

CREATE TABLE video (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    video_src TEXT NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

CREATE TABLE image (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    image_src TEXT NOT NULL,
    image_text TEXT NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

CREATE TABLE click_list (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

CREATE TABLE click_list_items (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    item_type varchar(30) NOT NULL,
    item_title TEXT NOT NULL,
    placeholder_text TEXT DEFAULT NULL,
    item_userdata_name varchar(100) NOT NULL,
    click_list_id int(11) NOT NULL,
    FOREIGN KEY (click_list_id) REFERENCES click_list(id) ON DELETE CASCADE
);

CREATE TABLE text (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    text_content TEXT NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id) ON DELETE CASCADE
);

-- Seed data  ------------------------------------------------------>

INSERT INTO `users` (`username`, `email`, `password`, `first_name`, `last_name`) VALUES 
('Connor812','connor812@gmail.com','123','Connor','Savoy');

INSERT INTO `permission`(`username`, `page_num`) VALUES ('Connor812','1');

INSERT INTO journal_page (`section_type`, `section_name`, `order_num`, `page_num`) VALUES 
('heading', 'heading 1', '1', '1'),
('heading', 'heading 2', '2', '1'),
('heading', 'heading 3', '3', '1'),
('heading', 'heading 4', '4', '1'),
('byline', 'byline 1', '5', '1'),
('byline', 'byline 2', '6', '1'),
('byline', 'byline 3', '7', '1'),
('click_list', 'click_list 1', '8', '1'),
('click_list', 'click_list 2', '9', '1'),
('quote', 'quote 1', '10', '1'),
('quote', 'quote 2', '11', '1'),
('quote', 'quote 3', '12', '1'),
('story_box', 'story_box 1', '13', '1'),
('story_box', 'story_box 2', '14', '1'),
('video', 'video 1', '15', '1'),
('image', 'image 1', "16", '1'),
('heading', 'heading 1', '1', '2'),
('heading', 'heading 2', '2', '2'),
('heading', 'heading 3', '3', '2'),
('heading', 'heading 4', '4', '2');


INSERT INTO heading (`heading_content`, `section_id`) VALUES 
('Connors First Heading','1'),
('Connors Second Heading','2'),
('Connors Third Heading','3'),
('Connors Forth Heading','4'),
('Connors First Heading','17'),
('Connors Second Heading','18'),
('Connors Third Heading','19'),
('Connors Forth Heading','20');

INSERT INTO byline (`byline_content`, `section_id`) VALUES 
('byline content 1', '5'),
('byline content 2', '6'),
('byline content 2', '7');

INSERT INTO click_list (`section_id`) VALUES 
('8'),
('9');


INSERT INTO click_list_items (`item_type`, `item_title`, `placeholder_text`, `item_userdata_name`, `click_list_id`) VALUES 
('checkbox', 'click list 1 title 1', NULL, 'types_trauma','1'),
('checkbox', 'click list 1 title 2', NULL, 'types_abuse','1'),
('textarea', 'click list 1 title 3', 'Placeholder text for click list 1 item 3', 'types_textarea', '1'),
('checkbox', 'click list 2 title 1', NULL, 'types_stress','2'),
('checkbox', 'click list 2 title 2', NULL, 'types_care','2'),
('textarea', 'click list 2 title 3', 'Placeholder text for click list 2 item 3', 'types_placeholder', '2');

INSERT INTO quote (`quote_content`, `section_id`) VALUES 
('Quote 1','10'),
('Quote 2','11'),
('Quote 3','12');

INSERT INTO story_box (`story_box_userdata_name`, `placeholder_text`, `section_id`) VALUES 
('stroy_box_data1', 'placeholder text for stroy box 1', '13'),
('stroy_box_data2', 'placeholder text for stroy box 2', '14');

INSERT INTO video (`video_src`, `section_id`) VALUES 
('videos/URmaster.mp4', '15');

INSERT INTO image (`image_src`, `image_text`, `section_id`) VALUES 
('images/book1.png', 'Image Text', '16');

-- Table for the user input ------------------------------------------------------------->

CREATE TABLE user_input (
    our_story TEXT DEFAULT NULL,
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    my_concerns TEXT DEFAULT NULL,
    respectful_communication BIT(1) DEFAULT 0,
    silence BIT(1) DEFAULT 0,
    profanity BIT(1) DEFAULT 0,
    dealing_with_stress_comment TEXT DEFAULT NULL,
    story_ending TEXT DEFAULT NULL,
    former_our_story TEXT DEFAULT NULL,
    former_partner_concerns TEXT DEFAULT NULL,
    former_respectful_communication BIT(1) DEFAULT 0,
    former_silence BIT(1) DEFAULT 0,
    former_profanity BIT(1) DEFAULT 0,
    former_dealing_with_stress_comment TEXT DEFAULT NULL,
    former_story_ending TEXT DEFAULT NULL,
    previous_partners TEXT DEFAULT NULL,
    partner_family_dysfunctional TEXT DEFAULT NULL,
    toxic_relationship TEXT DEFAULT NULL,
    relationship_damage TEXT DEFAULT NULL,
    relationship_self_esteem TEXT DEFAULT NULL,
    relationship_isolation TEXT DEFAULT NULL,
    relationship_basis TEXT DEFAULT NULL,
    belittling TEXT DEFAULT NULL,
    criticism TEXT DEFAULT NULL,
    blamed TEXT DEFAULT NULL,
    accused_of_cheating TEXT DEFAULT NULL,
    partner_cheated TEXT DEFAULT NULL,
    gave_in TEXT DEFAULT NULL,
    abusive BIT(1) DEFAULT 0,
    brandished_anger BIT(1) DEFAULT 0,
    barraged_calls BIT(1) DEFAULT 0,
    critical_of_clothes BIT(1) DEFAULT 0,
    called_family BIT(1) DEFAULT 0,
    damaged_property BIT(1) DEFAULT 0,
    withheld_finances BIT(1) DEFAULT 0,
    dissatisfying BIT(1) DEFAULT 0,
    not_reciprocated BIT(1) DEFAULT 0,
    comment_on_toxic_relationship TEXT DEFAULT NULL,
    no_reciprocation BIT(1) DEFAULT 0,
    no_attention BIT(1) DEFAULT 0,
    felt_insecure BIT(1) DEFAULT 0,
    more_intimacy BIT(1) DEFAULT 0,
    more_one_on_one BIT(1) DEFAULT 0,
    dissatisfying_comment TEXT DEFAULT NULL,
    medical_issues TEXT DEFAULT NULL,
    legal_issues TEXT DEFAULT NULL,
    financial_issues TEXT DEFAULT NULL,
    sexual_intimacy TEXT DEFAULT NULL,
    family_income TEXT DEFAULT NULL,
    feeling_stuck BIT(1) DEFAULT 0,
    no_medical_physical_needs BIT(1) DEFAULT 0,
    more_then_one_toxic_relationship BIT(1) DEFAULT 0,
    returned BIT(1) DEFAULT 0,
    repetitive_partners BIT(1) DEFAULT 0,
    giving_all_resources BIT(1) DEFAULT 0,
    professional_counselling TEXT DEFAULT NULL,
    experienced_violence BIT(1) DEFAULT 0,
    home_violence BIT(1) DEFAULT 0,
    family_suicide BIT(1) DEFAULT 0,
    death_of_parent BIT(1) DEFAULT 0,    
    childhood_experiences_comment TEXT DEFAULT NULL,
    substance_use BIT(1) DEFAULT 0,
    mental_health BIT(1) DEFAULT 0,
    instability BIT(1) DEFAULT 0,
    moving_around BIT(1) DEFAULT 0,
    family_in_jail BIT(1) DEFAULT 0,
    mom_in_toxic_relationship BIT(1) DEFAULT 0,
    prematurity BIT(1) DEFAULT 0,
    adopted BIT(1) DEFAULT 0,
    bullying BIT(1) DEFAULT 0,
    teen_dating_violence BIT(1) DEFAULT 0,
    community_violence BIT(1) DEFAULT 0,
    other_trauma BIT(1) DEFAULT 0,
    trauma_comment TEXT DEFAULT NULL,
    why_do_i_keeping_doing_this TEXT DEFAULT NULL,
    why_am_i_like_this TEXT DEFAULT NULL,
    how_did_i_get_here TEXT DEFAULT NULL,
    what_keeps_me TEXT DEFAULT NULL,
    why_am_i_stuck TEXT DEFAULT NULL,
    general_comment TEXT DEFAULT NULL,
    user_id int(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


-- Main Query to get the ordered list of data -------------------------------------------->

SELECT
    jp.id AS journal_page_id,
    jp.section_type,
    jp.section_name,
    jp.order_num,
    h.id AS heading_id,
    h.heading_content,
    q.id AS quote_id,
    q.quote_content,
    b.id AS byline_id,
    b.byline_content,
    sb.id AS story_box_id,
    sb.story_box_userdata_name,
    sb.placeholder_text,
    v.id AS video_id,
    v.video_src,
    c.id AS click_list_id,
    sh.id AS subheading_id,
    sh.subheading_content,
    i.id AS image_id,
    i.image_src,
    i.image_text
FROM journal_page AS jp
LEFT JOIN heading AS h ON jp.id = h.section_id
LEFT JOIN quote AS q ON jp.id = q.section_id
LEFT JOIN byline AS b ON jp.id = b.section_id
LEFT JOIN story_box AS sb ON jp.id = sb.section_id
LEFT JOIN video AS v ON jp.id = v.section_id
LEFT JOIN click_list AS c ON jp.id = c.section_id
LEFT JOIN subheading AS sh ON jp.id = sh.section_id
LEFT JOIN image AS i ON jp.id = i.section_id
WHERE jp.page_num = ?  -- Filter by page_num = 1
ORDER BY jp.order_num ASC;
-- Query for getting the click_list items for the click list

SELECT
    cl.id AS click_list_id,
    cl.section_id AS click_list_section_id,
    cli.id AS click_list_item_id,
    cli.item_type AS click_list_item_type,
    cli.item_title AS item_title,
    cli.placeholder_text AS placeholder_text,
    cli.item_userdata_name AS item_userdata_name
FROM click_list AS cl
LEFT JOIN click_list_items AS cli ON cl.id = cli.click_list_id
WHERE cl.id = ?;

-- Query for getting the story_box paragraphs

-- SELECT sb.id AS story_box_id,
--        sb.img,
--        sb.section_id,
--        sbp.id AS paragraph_id,
--        sbp.paragraph
-- FROM story_box AS sb
-- LEFT JOIN story_box_paragraphs AS sbp ON sb.id = sbp.story_box_id
-- WHERE sb.id = ?;



-- This is how ill fix the order when i delete an item out of a table

UPDATE your_table
SET order_number = order_number - 1
WHERE order_number > 3;
