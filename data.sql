insert into quick_learn_topic (topic_id, topic_name, created_at, updated_at, image) values 
(1, '挨拶', now(), now(), 'quick_learn/greeting.png'),
(2, '家族', now(), now(), 'quick_learn/family.png'),
(3, '食べ物', now(), now(), 'quick_learn/food.png'),
(4, '健康', now(), now(), 'quick_learn/health.png'),
(5, '趣味', now(), now(), 'quick_learn/hobby.png'),
(6, '買い物', now(), now(), 'quick_learn/shopping.jpg'),
(7, '旅行', now(), now(), 'quick_learn/travel.png'),
(8, '仕事', now(), now(), 'quick_learn/work.jpg');

insert into quick_learn_conlessontent (al_content_id, topic_id, japanese_sentence, vietnamese_sentence, vietnamese_katakana, audio, created_at, updated_at) values
(1, 1, 'こんにちは！', 'Xin chào!', 'シンチャオ!', 'quick_learn_1/hello.mp3', now(), now()),
(2, 1, 'お元気ですか?！', 'Bạn khỏe không?', 'パンクエコン?', 'quick_learn_1/how_are_you.mp3', now(), now()),
(3, 1, '私の名前は...です。', 'Tôi tên là...', 'トイ テン ラ...', 'quick_learn_1/my_name.mp3', now(), now()),
(4, 1, 'どこから来ましたか?', 'Bạn đến từ đâu?', 'バンデントゥダ?', 'quick_learn_1/where_from.mp3', now(), now()),
(5, 1, '私は日本から来ました。', 'Tôi đến từ Nhật Bản.', 'トイデントゥニャットパン', 'quick_learn_1/from_japan.mp3', now(), now()),
(6, 1, 'ありがとう!', 'Cảm ơn!', 'カームオン!', 'quick_learn_1/thanks.mp3', now(), now());

INSERT INTO lesson (`lesson_id`, `lesson_name`, `thumbnail`) VALUES 
(1, 'Tên tôi là yamada', 'lesson_1/greeting.png'),
(2, 'Tôi là giáo viên', 'lesson_1/jikosyoukai_man.png');

insert into vocab (vocab_id, lesson_id, word, meaning, audio, created_at, updated_at) values
(1, 3, 'chào', 'こんにちは', 'lesson_3/hi.mp3', now(), now()),
(2, 3, 'xin lỗi', 'すみません', 'lesson_3/sorry.mp3', now(), now()),
(3, 3, 'tên', '名前', 'lesson_3/name.mp3', now(), now()),
(4, 3, 'người', '人、～人', 'lesson_3/people.mp3', now(), now()),
(5, 3, 'nước', '国', 'lesson_3/country.mp3', now(), now()),
(6, 3, 'nào', 'どの', 'lesson_3/which.mp3', now(), now()),
(7, 3, 'là', '～です', 'lesson_3/is.mp3', now(), now()),
(8, 3, 'rất', 'とても', 'lesson_3/very.mp3', now(), now()),
(9, 3, 'vui', '嬉しい', 'lesson_3/happy.mp3', now(), now()),
(10, 3, 'gặp', '会う', 'lesson_3/meet.mp3', now(), now()),
(11, 3, 'rất vui được gặp', 'お会いできて嬉しい', 'lesson_3/happy_to_meet.mp3', now(), now());

insert into test_question (question_id, lesson_id, content) values
(1, 1, 'Bạn tên là gì?'),
(2, 1, 'Bạn đến từ đâu?'),
(3, 1, 'Câu nào dùng để chào hỏi ghi gặp ai đó lần đầu?'),
(4, 1, 'Nghĩa của từ sau là gì: chào'),
(5, 1, 'Xin lỗi, lớp bạn ở đâu vậy?'),
(6, 1, 'Dịch câu sau: お元気ですか？'),
(7, 2, ''),
(8, 2, ''),
(9, 2, ''),
(10, 2, ''),
(11, 2, '');

insert into test_question_choice (choice_id, question_id, content, is_correct) values
(1, 1, 'Tôi', false),
(2, 1, 'Tôi là sinh viên', false),
(3, 1, 'Tôi tên là lan', true),
(4, 1, 'Tôi là người Việt Nam', false),
(5, 2, 'Tôi tên là Nam', false),
(6, 2, 'Tôi ở quận hà đông', false),
(7, 2, 'Tôi đến từ việt Nam', true),
(8, 2, 'Đồ tráng miệng', false),
(9, 3, 'Bạn có khỏe không?', false),
(10, 3, 'Xin chào, tôi là Minh. Rất vui được gặp bạn.', true),
(11, 3, 'Bạn làm nghề gì?', false),
(12, 4, '嬉しい', false),
(13, 4, '国', false),
(14, 4, 'こんにちは', true),
(15, 4, '会う', false),
(16, 5, 'Tôi năm nay 22 tuổi.', false),
(17, 5, 'Tôi chưa ăn sáng.', false),
(18, 5, 'Lớp của tôi ở phòng 1, tầng 2, giảng đường B5.', true),
(19, 6, 'Bạn có khỏe không?', true),
(20, 6, 'Bạn muốn ăn gì?', false),
(21, 6, 'Bạn tên là gì?', false),
(22, 6, 'Bạn đang làm gì?', false);

insert into mock_test_question (question_id, `level`, content) values
(1, 1, 'Chó là ... tốt nhất của con người?'),
(2, 1, 'Trái dứng là gì?'),
(3, 1, 'Bảng chữ cái Tiếng Việt có bao nhiêu chữ cái?');

insert into mock_test_choice (choice_id, question_id, content, is_correct) values
(1, 1, 'đồ ăn', false),
(2, 1, 'người bạn', true),
(3, 1, 'thú nuôi', false),
(4, 1, 'gác nhà', false),
(5, 2, 'Hoa quả', true),
(6, 2, 'Đồ chơi', false),
(7, 2, 'Bộ phận con người', false),
(8, 2, 'Công cụ', false),
(9, 3, '27', false),
(10, 3, '29', true),
(11, 3, '31', false);