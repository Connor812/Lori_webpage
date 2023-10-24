CREATE DATABASE loridb;

USE loridb;

-- Set up of tables -------------------------------------------->

CREATE TABLE journal_page (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    section_type varchar(11) NOT NULL,
    order_num int(11) UNIQUE NOT NULL,
    section_name varchar(50) NOT NULL
);

CREATE TABLE header (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    header_content varchar(100) NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id)
);

CREATE TABLE quote (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    quote_content varchar(500) NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id)
);

CREATE TABLE byline (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id)
);

CREATE TABLE story_box (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    img BLOB DEFAULT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id)
);

CREATE TABLE story_box_paragraphs (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    paragraph varchar(500) NOT NULL,
    story_box_id int(11) NOT NULL,
    FOREIGN KEY (story_box_id) REFERENCES story_box(id)
);


CREATE TABLE video (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    video_data LONGBLOB NOT NULL,
    section_id int(11) NOT NULL,
    FOREIGN KEY (section_id) REFERENCES journal_page(id)
);

CREATE TABLE click_list (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    section_id int(11) NOT NULL
);

CREATE TABLE click_list_items (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    content varchar(200) NOT NULL,
    click_list_id int(11) NOT NULL,
    FOREIGN KEY (click_list_id) REFERENCES click_list(id)
);


-- Main Query to get the ordered list of data -------------------------------------------->

SELECT jp.id AS journal_page_id,
       jp.section_type,
       h.header_content,
       q.quote_content,
       b.section_id AS byline_section_id,
       sb.img AS story_box_img,
       sbp.paragraph AS story_box_paragraph,
       v.video_data,
       cl.id AS click_list_id
FROM journal_page AS jp
LEFT JOIN header AS h ON jp.id = h.section_id
LEFT JOIN quote AS q ON jp.id = q.section_id
LEFT JOIN byline AS b ON jp.id = b.section_id
LEFT JOIN story_box AS sb ON jp.id = sb.section_id
LEFT JOIN story_box_paragraphs AS sbp ON sb.id = sbp.story_box_id
LEFT JOIN video AS v ON jp.id = v.section_id
LEFT JOIN click_list AS cl ON jp.order_num = cl.section_id
ORDER BY jp.order_num;

-- Query for getting the click_list items for the click list

SELECT cl.id AS click_list_id,
       cl.section_id AS click_list_section_id,
       cli.id AS click_list_item_id,
       cli.content AS click_list_item_content
FROM click_list AS cl
LEFT JOIN click_list_items AS cli ON cl.id = cli.click_list_id
WHERE cl.id = ?;



-- Seed data  ------------------------------------------------------>