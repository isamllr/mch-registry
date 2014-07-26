CREATE DATABASE  IF NOT EXISTS `registry` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `registry`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `facilities`, Pregnancy, Employee
--

ALTER TABLE pregnancy
ADD COLUMN ReminderNotifications TINYINT NULL DEFAULT 1 AFTER FacilityID,
ADD COLUMN RecommendationNotifications TINYINT NULL DEFAULT 1 AFTER ReminderNotifications;

ALTER TABLE employees
ADD COLUMN `HighRiskPregnanciesSummaryNotification` TINYINT(1) NULL AFTER `Fax`;

ALTER TABLE facilities
ADD COLUMN `Phone` VARCHAR(20) NULL AFTER `FacilityName`;

--
-- Table structure for table `notificationtext`
--

DROP TABLE IF EXISTS `notificationtext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationtext` (
  `NotificationTextID` int(10) NOT NULL AUTO_INCREMENT,
  `NotificationID` int(10) NOT NULL,
  `Text` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `LanguageCode` varchar(2) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`NotificationTextID`),
  UNIQUE KEY `RecomendationTextID_UNIQUE` (`NotificationTextID`),
  KEY `NotificationID_idx` (`NotificationID`)
) ENGINE=InnoDB AUTO_INCREMENT=359 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificationtext`
--

LOCK TABLES `notificationtext` WRITE;
/*!40000 ALTER TABLE `notificationtext` DISABLE KEYS */;
INSERT INTO `notificationtext` VALUES (1,1,'Welcome. You have just missed your period, and you\'re already 5 weeks pregnant. Plan to go to the clinic soon.','UK'),(2,2,'Share the secret of your pregnancy with your health worker. She will give you iron and folic acid tablets to help your baby grow well.','UK'),(3,3,'Are you feeling sick? Most women do in early pregnancy. Try having some ginger, mint or lemon tea, and rest if you can.','UK'),(4,4,'Your baby is the size of a lentil. He already has tiny hands and feet and his heart is beating. ','UK'),(5,5,'Going to the clinic will help make sure that you and your baby stay healthy. Find out where your nearest clinic is today.','UK'),(6,6,'Spotting or light bleeding is worrying but very common in pregnancy. If you have bleeding with pain, contact the clinic immediately.','UK'),(7,7,'Your baby\'s heart and brain are forming. Take iron + folic acid pills each day to help her stay safe. You can get them free at the clinic.','UK'),(8,8,'Eat well, so your baby will grow well. Try to eat some meat, eggs, bean or lentils every day and green vegetables and milk, yoghurt or soya.','UK'),(9,9,'Light bleeding about the time you would have had your period is very common. If you have bleeding with pain, contact your health worker.','UK'),(10,10,'Your baby is the size of a grape and his bones are developing. You may feel sick or vomit. Eat when you can and drink plenty of clean water.','UK'),(11,11,'Some medicines can harm your baby. If your friends and family suggest a medicine, check with your health worker first before taking it.','UK'),(12,12,'Plan how you will get to the clinic for your first visit in a couple of weeks\' time. Ask your family for help to get there.','UK'),(13,13,'You are 2 months pregnant. Even though the baby inside you is tiny you may be very tired. That\'s normal. Growing a baby is hard work!','UK'),(14,14,'Protect yourself from infections. Wash your hands with soap before you prepare meals, after using the toilet and after handling animals.','UK'),(15,15,'Bad or stale food can make you ill. Make sure that all your food is fresh. Cook fresh meals every day. Store food in a cool, dry place.','UK'),(16,16,'Your baby is now the size of a date. Arrange to go the clinic for a check-up and for your iron and folic acid pills. Take these each day.','UK'),(17,17,'Giving birth puts you and your baby at risk of tetanus. The Tetanus vaccine can protect you both. Ask your health worker about it.','UK'),(18,18,'Iodine helps your baby\'s brain develop. Check the salt you buy has iodine added. Ask at the clinic if you are not sure.','UK'),(19,19,'You may be feeling less sick about now. Your baby is the size of your thumb and is protected by the water he floats in, inside your womb.','UK'),(20,20,'Blood tests done at the clinic check your iron levels. You may be offered the tetanus vaccine and an HIV test ','UK'),(21,21,'Feeling dizzy? Sit down, eat and drink something, until you feel better. Get up slowly. Try to eat little and often.','UK'),(22,22,'Drinking alcohol is bad for you and your baby. It could make your baby weak and ill. Don\'t drink in pregnancy.','UK'),(23,23,'If you have a fever, or start shaking and feeling sick, go to the clinic. A fever can affect your baby as well as you, and needs treating.','UK'),(24,24,'Drink plenty of clean water throughout the day. It can help wash away germs in your body. If you have pain urinating, go to the clinic.','UK'),(25,25,'Your baby is as big as half a banana! She is growing sucking muscles in her mouth. She will be ready to breastfeed as soon as she is born.','UK'),(26,26,'Don\'t forget to take your iron and folic acid pills. A dark line on your stomach is caused by pregnancy and will fade after the birth.','UK'),(27,27,'Smoking harms you and your baby. If you smoke, your baby could be born weak and catch infections easily. Stop smoking and avoid smoky places.','UK'),(28,28,'Your baby is growing hair, and he can also grasp, frown and even suck his thumb! Try to eat an extra mouthful of food at each meal and extra snacks.','UK'),(29,29,'Many women begin to feel less sick now and get hungry instead. Eat fruit, vegetables, and meat or lentils, peas, and beans.','UK'),(30,30,'Some pregnant women crave non-foods such as soil. Don\'t eat them. Talk to clinic staff if you have these cravings.','UK'),(31,31,'Inside you, your baby will just fit in the palm of your hand. He even has tiny fingernails and eye lashes.','UK'),(32,32,'Drinking alcohol can harm your baby. It can affect her growth. It\'s best not to have any alcohol. Drink plenty of clean water.','UK'),(33,33,'Open windows if your house is very smoky. Try to give up smoking while you are pregnant, as it can harm your baby.','UK'),(34,34,'Your baby is now the size of a pear. He may have found his first toy - the umbilical cord! After the birth, keep the cord stump clean.','UK'),(35,35,'Iron and folic acid tablets will help you stay well and help your baby grow well. Ask for them at the clinic. They are free.','UK'),(36,36,'Your baby is now the size of a small mango. If you are constipated drink plenty of clean water and eat fruit and vegetables. ','UK'),(37,37,'Keeping clean helps protect you and your baby from infections. Wash your hands with soap after the toilet and before meals.','UK'),(38,38,'You may need extra money during pregnancy, for travel to the clinic and for when your baby arrives. Start saving a little bit every day.','UK'),(39,39,'Your baby is twice the size he was last week. He\'s moving more and you will feel him soon. He can hear your heartbeat now.','UK'),(40,40,'Tired with headaches and dizziness? You may need iron. Remember to take your daily iron and folic acid pills. Get more from the clinic.','UK'),(41,41,'It is common to have backache during pregnancy. Lift heavy things carefully. Divide loads evenly between both hands.','UK'),(42,42,'Your baby has all her major organs now - the heart, liver and kidneys. She\'s even started developing taste buds on her tongue!','UK'),(43,43,'Ask about your blood group at the clinic. Check if relatives have the same blood group. Ask them if they will donate blood if you need it.','UK'),(44,44,'Make a plan with your family to put your new baby to the breast in the first hour. Your creamy first milk will protect him from illness.','UK'),(45,45,'You\'re halfway through pregnancy! Your baby floats in fluid. This protects him from bumps, keeps him warm and lets him move around.','UK'),(46,46,'You\'ll start feeling your baby kicking soon. Take time every day to feel him move. Tell your health worker of any changes.','UK'),(47,47,'Feeling out of breath when you walk? Your womb is squashing your lungs now. Go to the clinic if you find you are breathless all the time.','UK'),(48,48,'Your baby can hear your heartbeat and other noises from inside your body. He can hear your voice as well, so talk and sing to him.','UK'),(49,49,'Wash your hands with soap and water to help prevent infections. Wash them after handling animals, using the latrine and before cooking.','UK'),(50,50,'Go to the clinic if you have a fever, vomiting, bleeding or pain when you pass urine. Make sure your family know these signs, too.','UK'),(51,51,'Your baby can turn over as well as kick. This is a good sign. Tell your health worker if you notice your baby moving much less than usual.','UK'),(52,52,'As your baby grows inside you, he will need more food. Slowly increase the amount of food you eat as your stomach grows.','UK'),(53,53,'Growing a baby can make you feel very tired. Get as much rest as you can. Ask your family to help with shopping, cooking and cleaning.','UK'),(54,54,'Your baby now has definite times of sleeping and waking. He may wake you with his kicks. Go to the clinic if the kicks slow down or stop.','UK'),(55,55,'If anyone in your family has TB, there are medicines that can cure it. If they get treatment, it will help protect your baby when he\'s born.','UK'),(56,56,'The area around your nipples may become darker and your breasts may feel heavier now. Your body is preparing to breastfeed your baby.','UK'),(57,57,'Your baby\'s sense of taste is developing, ready to enjoy your milk! Your breastmilk will make your baby grow strong. It\'s the perfect food. ','UK'),(58,58,'Your first milk is best for your baby. Let your partner know you want to breastfeed your baby within the first hour. He can support you.','UK'),(59,59,'It\'s time for your next clinic visit. Get more iron and folic-acid tablets. If the clinic is out of stock, ask when to go back for them. ','UK'),(60,60,'Your baby is gaining fat. This fat will help keep him warm when he is born. You can help him by eating a few extra mouthfuls at each meal.','UK'),(61,61,'Your growing baby needs plenty of iron. Try to eat meat, lentils, beans or chickpeas every day, and take your iron pill.','UK'),(62,62,'A burning sensation at the top of your stomach is heartburn. Spicy and oily foods can make it worse. A glass of milk may help soothe it.','UK'),(63,63,'Your baby is about the size of a pineapple. He is practising moving the muscles in his chest, so he will be ready to breathe at birth.','UK'),(64,64,'Complications sometimes occur when giving birth. It\'s best to try and have your baby at a clinic',' t'),(65,65,'As your baby grows, taking up more room in the womb, you may find it hard to eat big meals. Eat little and often to get enough food.','UK'),(66,66,'Babies dream at this stage in pregnancy. Perhaps he\'s dreaming about being born! If he\'s not as active as usual, tell your health worker.','UK'),(67,67,'Calcium helps your baby\'s bones and teeth grow strong. Drink milk and eat dried figs, naan bread, beans or vegetables to get plenty of calcium.','UK'),(68,68,'Slightly swollen hands and feet are common in pregnancy. But if you have sudden swelling and headaches, go to the clinic.','UK'),(69,69,'Your baby responds to change - she may move when you undress! Feel thirsty and need to urinate a lot? Tell clinic staff, it may be diabetes.','UK'),(70,70,'Giving birth at home? At the clinic, you can get a birth kit with a plastic sheet, a sterile cord-cutting tool and string to tie the cord.','UK'),(71,71,'Drink plenty of water and eat fruit to keep your stools soft. If you have itching around the anus, wash the area after you open your bowels.','UK'),(72,72,'Your baby is the same size as a large breadfruit. You may feel him reacting to light and sound. He may wriggle when you sing to him.','UK'),(73,73,'Eat two extra mouthfuls of food at each meal and a healthy snack between meals. Eat something extra before you go to bed, too.','UK'),(74,74,'If you need a blood transfusion, your friends & family can donate. Ask them to find out if their blood group matches yours. ','UK'),(75,75,'Your baby can open and close his eyes. Inside your womb, he can tell day from night by the way the light changes.','UK'),(76,76,'Are you having your baby at the clinic? Find out the fastest way to get there and what transport you can take. Ask your family to help you.','UK'),(77,77,'Not going to a clinic for the birth? Make sure you have a trained birth attendant and a birth kit ready so you have a safe, clean birth.','UK'),(78,78,'If you could take a peek inside, you would see if you have a boy or girl, as the genitals have now developed.','UK'),(79,79,'Have a trained birth attendant present during birth. She will know how to deliver the placenta safely and can stop you bleeding too much.','UK'),(80,80,'Have you felt your belly tighten suddenly, then relax? This was a practice contraction. Your body is getting ready for labour.','UK'),(81,81,'Your baby is getting plump! This body fat will keep him warm when he is born. Have 2 cloths ready. One to dry him and one to wrap him in. ','UK'),(82,82,'Have a hat or small cloth ready to cover your new baby\'s head. Babies lose lots of heat from their heads. Hold him close to keep him warm.','UK'),(83,83,'It\'s time for your third clinic visit. Make plans to put your baby to the breast as soon as he is born. Do not give honey or anything else.','UK'),(84,84,'Your baby may settle head down now, the best position to be born! You may find it harder to walk. It\'s time to slow down.','UK'),(85,85,'If the bag of waters your baby is in breaks, go to the clinic. Your baby is at risk of infection. It may be a trickle or a gush.','UK'),(86,86,'Leg cramps may wake you up at night. Stretch your leg, walk around and stand on something cold to ease the cramps.','UK'),(87,87,'A baby born early needs extra care and warmth. If he is too weak to breastfeed, give him expressed milk. Clinic staff can show you how.','UK'),(88,88,'Sudden swelling of hands, face and feet is a sign of a problem. Tell your family, and ask them to take you to the clinic if they see this.','UK'),(89,89,'Your baby will drop lower now ready to be born. You will breathe more easily, but may also have to urinate more frequently.','UK'),(90,90,'Your body is designed to give birth. It will stretch and open with each contraction in labour, making space for your baby to be born.','UK'),(91,91,'Breastfeeding is the best way. It is safe, prevents illness, and helps your baby grow strong. Let your baby suckle whenever he wants.','UK'),(92,92,'Sometimes an operation is the safest way to have your baby. Choose a clinic where you trust the staff just in case you need an operation.','UK'),(93,93,'Your newborn baby will need help to stay warm when he\'s born. Have some cloths ready to wrap and dry him with, and hold him close to you.','UK'),(94,94,'To cut the cord, you need a new razor blade or sterile knife and two pieces of string about the length of your hand. Get these ready now.','UK'),(95,95,'It\'s time for your last check-up at the clinic. Use this check-up to ask questions about the birth and how to cut the cord safely.','UK'),(96,96,'When the cord stops pulsing, tie a piece of string 3 fingers from you, another 3 fingers from the baby. Cut the cord between the strings.','UK'),(97,97,'A cord infection can make your baby very ill. Sponge the cord with clean water and leave it uncovered to dry. Don\'t put anything else on it.','UK'),(98,98,'Don\'t bathe your baby for the first 6 hours of her life. Keep her well wrapped up and her head covered. The cord will drop off after a week.','UK'),(99,99,'Your baby is curled up inside you all ready to be born. Talk to your health worker about the vaccinations your baby needs when she is born.','UK'),(100,100,'A jelly-like substance on your underwear is a sign that labour will start soon. If you have bleeding like a period, go to the clinic.','UK'),(101,101,'Low back pain is a sign that the baby is low down, ready to get born. Make sure you can get to the clinic in time.','UK'),(102,102,'It is natural to worry with the birth so close, but you don\'t have to do it alone. Talk to your health worker, she can guide you.','UK'),(103,103,'Your baby needs nothing else apart from breastmilk for the first 6 months. Your milk will contain all the water and goodness he needs.','UK'),(104,104,'Your body knows how to care for your baby. As she grows, the milk you make will change to suit her, and you\'ll make the right amount.','UK'),(105,105,'Your baby can hear, see, and suck. He is snug and warm curled up inside you. He is ready to be born and will be able to feed straight away.','UK'),(106,106,'Your new baby will feel the cold. Keep him dry and nurse him on your bare chest under a blanket to help keep him warm.','UK'),(107,107,'Your new baby needs your care. If she\'s having trouble breathing or feeding, is too hot or too cold, or doesn\'t respond, go to the clinic.','UK'),(108,108,'Your baby is waiting for labour to start as well. You do this together! Make sure you have everything ready.','UK'),(109,109,'After birth, you will bleed like a very heavy period, so be prepared. Let your baby suckle straight after birth to help lessen the bleeding.','UK'),(110,110,'Go back to the clinic after the birth if your bleeding is heavy, it has a bad smell, you pass clots of blood, or you feel faint. ','UK'),(111,111,'If your baby is still not here by next week, visit the clinic. Make sure you can get to the clinic when labour does start.','UK'),(112,112,'Regular, strong contractions are a sign of labour. If you feel them, go to the clinic or fetch your birth attendant. Don\'t wait.','UK'),(113,113,'When your baby is here, you can get help from your health worker. Talk to your health worker about anything. She is your friend.','UK'),(177,64,'Іноді ускладнення під час пологів. Це найкраще, мати дитину в клініці',' Т'),(227,1,'Welcome. You have just missed your period, and you\'re already 5 weeks pregnant. Plan to go to the clinic soon.','RU'),(228,2,'Share the secret of your pregnancy with your health worker. She will give you iron and folic acid tablets to help your baby grow well.','RU'),(229,3,'Вы чувствуете себя больным? Большинство женщин делают на ранних сроках беременности. Попробуйте иметь некоторые имбирь, мята или чай с лимоном и отдыха, если вы можете.','RU'),(230,4,'Your baby is the size of a lentil. He already has tiny hands and feet and his heart is beating. ','RU'),(231,5,'Собирается помочь клиника хочет убедиться, что вам и вашему ребенку оставаться здоровым. Узнайте, где ваши ближайшие клиники сегодня.','RU'),(232,6,'Кровянистые выделения или легкие кровотечения является тревожной, но очень часто во время беременности. Если у вас есть кровотечение с болью, немедленно свяжитесь с клиникой.','RU'),(233,7,'Формирование сердца и мозга Вашего ребенка. Принимать железо + фолиевая кислота таблетки каждый день, чтобы помочь ей оставаться в безопасности. Вы можете получить их бесплатно в клинике.','RU'),(234,8,'Ешьте хорошо, поэтому ваш ребенок будет расти хорошо. Попробуйте съесть некоторые мясо, яйца, фасоль или чечевица, каждый день и зеленых овощей и молока, йогурта или сои.','RU'),(235,9,'Свет, кровотечение о времени, вы имели бы ваш период является очень распространенным. Если у вас есть кровотечение с болью, контакт вашего здоровья работника.','RU'),(236,10,'Ваш ребенок имеет размер винограда и разрабатывают его кости. Вы можете чувствовать себя больным или рвотой. Ешьте, когда вы можете и пить много чистой воды.','RU'),(237,11,'Некоторые лекарства могут нанести вред вашему ребенку. Если ваши друзья и семья предложить медицина, проверьте с вашего здоровья работника, прежде чем принимать его.','RU'),(238,12,'План, как вы хотите попасть в клинику для вашего первого визита в пару недель. Спросите вашей семьи за помощью, чтобы туда добраться.','RU'),(239,13,'Ты 2 месяца беременности. Несмотря на то, что ребенок внутри вас крошечные вы можете быть очень устал. Это нормально. Рост ребенка – это тяжелая работа!','RU'),(240,14,'Защитите себя от инфекций. Мойте руки с мылом перед тем, как вы готовить, после посещения туалета и после обработки животных.','RU'),(241,15,'Бад или устаревшие продукты могут сделать вас илл убедитесь, что все продукты свежие. Свежий готовить каждый день. Хранить продукты в прохладном, сухом месте.','RU'),(242,16,'Your baby is now the size of a date. Arrange to go the clinic for a check-up and for your iron and folic acid pills. Take these each day.','RU'),(243,17,'Рождение ставит вас и вашего ребенка на риск столбняка. Столбняк вакцина может защитить вас обоих. Попросите у вашего здоровья о нем.','RU'),(244,18,'Йод помогает развивать мозг вашего ребенка. Проверить соль, вы покупаете имеет добавлен йод. Если вы не уверены, спросите в клинике.','RU'),(245,19,'Вы можете чувствовать меньше больных о сейчас. Ваш ребенок — это размер вашего большого пальца руки и защищен от воды, которую он плавает в, внутри вашей матки.','RU'),(246,20,'Анализы крови, сделать в клинике проверить ваш уровень железа. Вам могут быть предложены вакцины против столбняка и ВИЧ теста','RU'),(247,21,'Головокружение? Сесть, поесть и выпить что-нибудь, до тех пор, пока вы почувствуете себя лучше. Вставать медленно. Старайтесь есть мало и часто.','RU'),(248,22,'Употребление алкоголя вредно для вас и вашего ребенка. Это может сделать ваш ребенок слаб и плохо не пить во время беременности.','RU'),(249,23,'Если у вас есть лихорадка, или начать покачивая и ощущение больным, пойти в клинику. Лихорадка может повлиять на малыша, так как вы и потребности.','RU'),(250,24,'Пейте много чистой воды в течение дня. Это может помочь смыть микробы в вашем теле. Если у вас есть боли в мочеиспускании, пойти в клинику.','RU'),(251,25,'Ваш ребенок большой, как половина банана! Она растет сосание мышцы в ее рот. Она хочет быть готов кормить грудью, как только она рождается.','RU'),(252,26,'Не забудьте взять таблетки железа и фолиевой кислоты. Темная линия на животе вызвана беременностью и будет исчезать после родов.','RU'),(253,27,'Курение причиняет вред вам и вашему ребенку. Если вы курите, ваш ребенок может родиться слабым и легко поймать инфекции. Бросьте курить и избегайте дымный мест.','RU'),(254,28,'Ваш ребенок растет волос, и он может таким образом понять, хмуриться и даже сосать палец! Попробуйте съесть на дополнительных рот пищи на каждой еды и дополнительные закуски.','RU'),(255,29,'Many women begin to feel less sick now and get hungry instead. Eat fruit, vegetables, and meat or lentils, peas, and beans.','RU'),(256,30,'Some pregnant women crave non-foods such as soil. Don\'t eat them. Talk to clinic staff if you have these cravings.','RU'),(257,31,'Внутри вас ваш ребенок будет просто помещается в ладони вашей руки. Он даже имеет крошечные ногти и ресницы.','RU'),(258,32,'Употребление алкоголя может нанести вред вашему ребенку. Это может повлиять на ее рост. Это лучше не иметь каких-либо алкоголя. Пейте много чистой воды.','RU'),(259,33,'Открытые окна, если ваш дом является очень дымно. Постарайтесь бросить курить во время беременности, как это может нанести вред вашему ребенку.','RU'),(260,34,'Ваш ребенок в настоящее время размер груша. Он может найти его первая игрушка - пуповины! После рождения Держите шнур чистой пень.','RU'),(261,35,'Железа и фолиевой кислоты таблетки, чтобы помочь хорошо остаться и помочь вашему ребенку расти хорошо. Попросите их в клинике. Они свободны.','RU'),(262,36,'Ваш ребенок в настоящее время размер небольшой манго. Если вы запорами пить много чистой воды и съесть фрукты и овощи.','RU'),(263,37,'Сохраняя в чистоте помогает защитить вас и вашего ребенка от инфекций. Мойте руки с мылом после туалета и перед едой.','RU'),(264,38,'Во время беременности, для поездки в клинику и когда прибудет ваш ребенок может потребоваться дополнительные деньги. Начните экономить немного каждый день.','RU'),(265,39,'Ваш ребенок-это вдвое больше, он то, что на прошлой неделе. Он движется больше, и вы хотите чувствовать себя его скоро. Теперь он может услышать Ваше сердцебиение.','RU'),(266,40,'Устали с головные боли и головокружение? Вам может понадобиться железа. Помните, чтобы принимать ежедневно таблетки железа и фолиевой кислоты. Получите больше от клиники.','RU'),(267,41,'Она является общей для боли в спине во время беременности. Осторожно снять тяжелые вещи. Разделите нагрузок равномерно между обеими руками.','RU'),(268,42,'Ваш ребенок уже всех ее главных органов - сердца, печени и почек. Она даже начала разработку ключевых бутоны на ее языке!','RU'),(269,43,'Спросите о группе крови в клинике. Проверьте, если родственники имеют ту же группу крови. Спросите их, если они хотят сдавать кровь, если это необходимо.','RU'),(270,44,'Составьте план вашей семьи поставить вашего нового ребенка к груди в первый час. Ваше молоко сливочное впервые будет защищать его от болезни.','RU'),(271,45,'Ты в середине беременности! Ваш ребенок плавает в жидкости. Это защищает его от ударов, держит его в тепло и позволяет ему двигаться вокруг.','RU'),(272,46,'Вы начинаете чувство вашего ребенка вскоре ногами. Возьмите время каждый день чувствовать себя его двигаться. Скажите Ваш медицинский работник каких-либо изменений.','RU'),(273,47,'Чувство из дыхание, когда вы ходите? Теперь вашей матки является давя ваши легкие. Перейти в клинику, если вы найдете что Вы затаив дыхание все время.','RU'),(274,48,'Ваш ребенок слышит Ваше сердцебиение и другие шумы от внутри вашего тела. Он может слышать ваш голос, чтобы говорить и петь ему.','RU'),(275,49,'Мойте руки с мылом и водой для предотвращения инфекции. Мыть их после обработки животных, используя гальюн и перед приготовлением.','RU'),(276,50,'Перейти в клинику, если у вас есть лихорадка, рвота, кровотечение или боль, когда вы пройти мочи. Убедитесь, что вашей семье знать эти знаки тоже.','RU'),(277,51,'Ваш ребенок может перевернуться, а также удар. Это хороший знак. Скажите Ваш медицинский работник, если вы заметили вашего ребенка двигаться гораздо меньше, чем обычно.','RU'),(278,52,'Как ваш младенец растет внутри вас, ему потребуется больше пищи. Постепенно увеличьте количество пищи, которую вы едите, как растет ваш живот.','RU'),(279,53,'Рост младенца может сделать вас чувствовать себя очень уставшим. Получите как много отдыха, как вы можете. Спросите вашей семьи, чтобы помочь с покупки, приготовление пищи и уборка.','RU'),(280,54,'Ваш ребенок теперь имеет определенные периоды сна и бодрствования. Он может разбудить вас с его ногами. Идти в клинику, если ногами, чтобы замедлить или остановить.','RU'),(281,55,'Если кто-то в вашей семье ТБ, есть лекарства, которые можно вылечить, если они получают лечение, он хочет, чтобы помочь защитить вашего ребенка, когда он рождается.','RU'),(282,56,'Область вокруг сосков могут стать темнее и ваши груди могут чувствовать тяжелее сейчас. Ваше тело готовится к кормить грудью малыша.','RU'),(283,57,'Вашего ребенка чувство ключевых развивающихся, готовы наслаждаться вашим молоком! Ваше грудное молоко сделает вашего ребенка становятся сильными. Это идеальная пища.','RU'),(284,58,'Ваше первое молоко лучше всего подходит для вашего ребенка. Пусть ваш партнер знает, что вы хотите кормить грудью вашего ребенка в течение первого часа. Он может поддержать вас.','RU'),(285,59,'Пришло время для вашего следующего посещения клиники. Получите больше железа и фолиевой кислоты таблетки. Если клиники нет на складе, спросите когда вернуться для них.','RU'),(286,60,'Ваш ребенок набирает жир. Этот жир поможет держать его в тепле, когда он рождается. Вы можете помочь ему, съев несколько дополнительных глотка в каждый прием пищи.','RU'),(287,61,'Ваш растущий ребенок требует много железа. Попробуйте съесть мясо, чечевица, фасоль или горох каждый день и принимать ваши таблетки железа.','RU'),(288,62,'Чувство жжения в верхней части живота является изжога. Острой и жирной пищи может сделать его хуже. Стакан молока может помочь успокоить его.','RU'),(289,63,'Ваш ребенок — о размерах ананас. Он практикует двигать мышцы в груди, поэтому он будет готов дышать при рождении.','RU'),(290,64,'Иногда возникнуть осложнения при родах. Лучше попробовать и у вашего ребенка в клинике',' Т'),(291,65,'Как ваш ребенок растет, занимают больше места в утробе матери, вы может найти его трудно есть большие блюда. Ешьте мало и часто, чтобы получить достаточное количество пищи.','RU'),(292,66,'Сон младенцев на этом этапе беременности. Возможно он мечтает о рождении! Если он не так активно, как обычно, расскажите ваше здоровье работника.','RU'),(293,67,'Кальций помогает вашего ребенка кости и зубы становятся сильными. Пить молоко и есть сушеные Кейдж, naan хлеб, фасоль или овощей, чтобы получить большое количество кальция.','RU'),(294,68,'Слегка опухшие руки и ноги являются общими во время беременности. Но если у вас есть внезапный отек и головные боли, пойти в клинику.','RU'),(295,69,'Ваш ребенок реагирует на изменения - она может двигаться, когда вы Раздевайтесь! Чувствую много пить и позывы к мочеиспусканию? Расскажите сотрудникам клиники, это может быть сахарный диабет.','RU'),(296,70,'Родов в домашних условиях? В клинике вы можете получить комплект рождения с пластиковый лист, стерильные шнур режущий инструмент и повязывают запись.','RU'),(297,71,'Пейте много воды и съесть фрукт, чтобы держать ваш стул мягкий. Если у вас есть зуд вокруг ануса, мыть области, после того, как вы открываете ваш кишечник.','RU'),(298,72,'Ваш ребенок имеет такой же размер как большие плоды хлебного дерева. Вы можете почувствовать его реагируют на свет и звук. Эй может выкрутиться, когда вы поете ему.','RU'),(299,73,'Есть два дополнительных глотка пищи на каждый прием пищи и здоровые закуски между приемами пищи. Есть что-то дополнительно, прежде чем вы идете спать, тоже.','RU'),(300,74,'Если вам нужно переливание крови, ваши друзья и семья могут пожертвовать. Попросите их, чтобы узнать, если их группа крови соответствует твое.','RU'),(301,75,'Ваш ребенок может открыть и закрыть глаза. Внутри вашей матки он может рассказать день от ночи кстати легкие изменения.','RU'),(302,76,'Вы с малышом в клинике? Узнайте, самый быстрый способ добраться туда и что транспорт вы можете принять. Спросите вашей семьи, чтобы помочь вам.','RU'),(303,77,'Не буду в клинику для рождения? Убедитесь, что у вас есть подготовленных акушерок и рождения комплект готов, так что у вас есть Сейф, очистить рождения.','RU'),(304,78,'Если вы могли заглянуть внутрь, вы увидите, если у вас мальчик или девочка, как гениталии уже разработали.','RU'),(305,79,'У подготовленных акушерок во время рождения. Она хочет знать, как безопасно доставить плаценту и можно остановить кровотечение слишком много.','RU'),(306,80,'У вас отдохнуть чувствовал ваш живот подтянуть внезапно, тогда? Это то, что практика дефляции. Ваше тело готовится к труда.','RU'),(307,81,'Ваш ребенок становится пухлые! Этот жир будет держать его теплым, когда он рождается. Есть 2 салфетки готова. Один для просушки его и одного, чтобы обернуть его в.','RU'),(308,82,'У имеет или небольшое полотно готовы покрыть голову вашего нового ребенка. Дети теряют много тепла из их головы. Держите его близко к держать его в тепле.','RU'),(309,83,'Пришло время для третьего посещения клиники. Сделайте план поставить вашего ребенка к груди, как только он родился. Не дают мед, или что-нибудь еще.','RU'),(310,84,'Ваш ребенок может решить голову вниз, лучше родиться! Вы можете найти труднее ходить. Пришло время, чтобы замедлить.','RU'),(311,85,'Если в мешок из воды малышу в перерывах, пойти в клинику Ваш ребенок подвергается риску инфицирования. Это может быть ручеек или erupt.','RU'),(312,86,'Судороги ног могут разбудить вас ночью. Растянуть ваши ноги, ходить вокруг и стоял на чем-то холодно, чтобы облегчить судороги.','RU'),(313,87,'Ребенок, Родившийся в начале требует дополнительный уход и тепло. Если он слишком слаб, чтобы кормить, давать ему выразили молоко. Сотрудники клиники может показать вам, как.','RU'),(314,88,'Внезапные отеки рук, лица и ног является признаком проблемы. Расскажите вашей семье и попросить их принять вас в клинику, если они видят это.','RU'),(315,89,'Ваш ребенок хочет упасть ниже теперь готов родиться. Вы хотите дышать более легко, но так что возможно придется мочиться более часто.','RU'),(316,90,'Ваше тело предназначен для родов. Он хочет растянуть и открыть с каждой дефляции в труд, делая пространство для вашего ребенка, чтобы родиться.','RU'),(317,91,'Грудное вскармливание является наилучшим способом. Он безопасен, предотвращает болезни и помогает малышу расти сильным. Пусть ваш ребенок вскармливать всякий раз, когда он хочет.','RU'),(318,92,'Иногда операция является наиболее безопасный способ для вашего ребенка. Выберите клинику, где вы доверяете сотрудников в случае, если вам нужна операция.','RU'),(319,93,'Ваш новорожденный ребенок будет нужна помощь, чтобы согреться, когда он рождается. У некоторых полотен готовы обернуть и его с сухой и удержать его рядом с вами.','RU'),(320,94,'Чтобы вырезать мозг, необходимо новым лезвием или стерильными нож и два кусочка строки о длине вашей руки. Получите эти готовы сейчас.','RU'),(321,95,'Пришло время для вашего последнего обследования в клинике. Используйте этот осмотр на задают вопросы о рождении и как безопасно отрезать шнур.','RU'),(322,96,'Когда шнур перестает пульсирует, галстук часть строки 3 пальцев от вас, еще 3 пальцев от ребенка. Отрежьте шнур между строками.','RU'),(323,97,'Шнур инфекции может сделать ваш ребенок очень плохо Губка шнур с чистой водой и оставить его обнаружили высохнуть. Не кладите ничего на нем.','RU'),(324,98,'Не купать вашего малыша за первые 6 часов своей жизни. Держите ее хорошо завернутый и ее покрытой головой. Шнур будет уменьшаться после недели.','RU'),(325,99,'Ваш ребенок является свернувшись внутри вас все готовы родиться. Поговорите с вашего медицинского работника о вакцинации ваш ребенок нуждается, когда она рождается.','RU'),(326,100,'Желеобразной вещество на вашем белье является признаком того, что скоро начнется труда. Если у вас есть кровотечение как период, пойти в клинику.','RU'),(327,101,'Температура, боль в спине является признаком, что ребенок находится низко, готовы получить родился. Убедитесь, что вы можете получить в клинику во времени.','RU'),(328,102,'Это естественно беспокоиться с рождения так близко, но вы не должны делать это в одиночку. Поговорите с вашего медицинского работника, она может направить вас.','RU'),(329,103,'Ваш ребенок нуждается ничего кроме грудного молока в первые 6 месяцев. Ваше молоко будет содержать все воды и добра, он нуждается.','RU'),(330,104,'Ваше тело знает, как ухаживать за малышом. Как она растет, молоко будет меняться костюм сделать здесь, и вы будете делать нужное количество.','RU'),(331,105,'Ваш ребенок может слышать, видеть и сосать. Он уютно и тепло свернувшись внутри вас. Он готов родиться и будут иметь возможность кормить сразу.','RU'),(332,106,'Ваш новый младенец будет чувствовать холод. Держать его сухим и медсестра ему на груди голой под одеяло, чтобы помочь сохранить его теплым.','RU'),(333,107,'Ваш новый ребенок нуждается в вашей заботе. Если она испытывает затрудненное дыхание или кормления, слишком жарко или слишком холодно, или не отвечает, пойти в клинику.','RU'),(334,108,'Вашего ребенка ждет труда начать также. Вам сделать это вместе! Убедитесь, что у вас все готово.','RU'),(335,109,'После рождения будет кровоточить как очень тяжелый период, так что будьте готовы. Пусть ваш ребенок вскармливать сразу после рождения, чтобы помочь уменьшить кровотечение.','RU'),(336,110,'Вернуться в клинику после рождения, если ваш кровотечение, тяжелая, она имеет неприятный запах, вам проход в крови, или вы чувствуете слабый.','RU'),(337,111,'Если ваш ребенок ещё не здесь на следующей неделе посетить клинику. Убедитесь, что вы можете получить в клинику, когда начать труда.','RU'),(338,112,'Регулярные, сильные схватки являются признаком труда. Если вы чувствуете их, идти в клинику или принести ваши повитухи. Не ждите.','RU'),(339,113,'Когда ваш ребенок здесь, вы можете получить помощь от вашего здоровья работника. Поговорить с вашего работника здравоохранения, о чем угодно. Она является вашим другом.','RU'),(340,114,'Dear [patientname], this is a reminder for your scheduled visit at [facilityname]. Please be there at [visitdate]. Sent by MCH-Registry','UK'),(341,114,'Здравствуйте. Это напоминание для вашего запланированного визита в [hospitalname]. Пожалуйста, будьте там в [visitdatetime]. Прислал MCH-реестр','RU'),(343,115,'Dear [doctorname], patient [patientname] who is having a high risk pregnancy is visiting at [visitdate] at facility [facilityname]. Sent by MCH-registry','UK'),(345,115,'Здравствуйте. Существует беременность визит высокого риска запланировано на [visitdatetime] на предприятии [hospitalname] идут вверх. Прислал MCH-реестр','RU'),(346,116,'Dear [doctorname], on [reportdate] there are the following high risk pregnancies ongoing in your region: [report]. Monthly report sent by MCH-registry','UK'),(348,116,'High risk pregnancy summary [hospitalname]. Sent by MCH-registry','RU'),(349,117,'Hello [doctorname]. Patient [patientname] was discharged at [dischargedate] from facility [facilityname]. Sent by MCH-registry','UK'),(351,117,'Patient [patientname] was released from hospital [hospitalname] where you have referred her to. Sent by MCH-registry','RU'),(357,120,'Hello [patientname]. You have been unsubscribed from the MCH-registry SMS Service. If you would like to receive our messages again, please send \'START\' to this number. Goodbye','UK'),(358,121,'Dear [patientname], welcome to the MCH-Registry SMS Service. This service will accompany you during your pregnacy, give you helpful tips and send you reminders for your scheduled visits at the hospital. \r\nIf you would not like to receive any further SMS messages, please send the message \'STOP\' to this number. Sent by MCH-registry','UK');
/*!40000 ALTER TABLE `notificationtext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificationqueuehistory`
--

DROP TABLE IF EXISTS `notificationqueuehistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationqueuehistory` (
  `NotificationQueueID` bigint(20) NOT NULL,
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `SuccessfullySent` tinyint(1) DEFAULT NULL,
  `DateTimeSent` DATETIME NULL,
  PRIMARY KEY (`NotificationQueueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `notificationsmsservice`
--

DROP TABLE IF EXISTS `notificationsmsservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationsmsservice` (
  `NotificationSMSServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `NotificationProvider` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `NotificationProtocol` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`NotificationSMSServiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificationsmsservice`
--

LOCK TABLES `notificationsmsservice` WRITE;
/*!40000 ALTER TABLE `notificationsmsservice` DISABLE KEYS */;
INSERT INTO `notificationsmsservice` VALUES (1,'Clickatell','SOAP');
/*!40000 ALTER TABLE `notificationsmsservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificationqueuelastfill`
--

DROP TABLE IF EXISTS `notificationqueuelastfill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationqueuelastfill` (
  `NotificationQueueLastFillID` int(11) NOT NULL AUTO_INCREMENT,
  `LastFillDate` date DEFAULT NULL,
  `NotificationTypeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`NotificationQueueLastFillID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificationqueuelastfill`
--

LOCK TABLES `notificationqueuelastfill` WRITE;
/*!40000 ALTER TABLE `notificationqueuelastfill` DISABLE KEYS */;
INSERT INTO `notificationqueuelastfill` VALUES (1,null,1),(2,null,2),(3,null,3),(4,null,4),(5,null,5),(6,null,6),(7,null,7);
/*!40000 ALTER TABLE `notificationqueuelastfill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL AUTO_INCREMENT,
  `Day` int(10) unsigned zerofill DEFAULT NULL,
  `NotificationTypeID` int(10) DEFAULT NULL,
  PRIMARY KEY (`NotificationID`),
  UNIQUE KEY `idrecommendations_UNIQUE` (`NotificationID`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,0000000029,1),(2,0000000029,1),(3,0000000029,1),(4,0000000036,1),(5,0000000036,1),(6,0000000036,1),(7,0000000043,1),(8,0000000043,1),(9,0000000043,1),(10,0000000050,1),(11,0000000050,1),(12,0000000050,1),(13,0000000057,1),(14,0000000057,1),(15,0000000057,1),(16,0000000064,1),(17,0000000064,1),(18,0000000064,1),(19,0000000071,1),(20,0000000071,1),(21,0000000071,1),(22,0000000078,1),(23,0000000078,1),(24,0000000078,1),(25,0000000085,1),(26,0000000085,1),(27,0000000085,1),(28,0000000092,1),(29,0000000092,1),(30,0000000092,1),(31,0000000099,1),(32,0000000099,1),(33,0000000099,1),(34,0000000106,1),(35,0000000106,1),(36,0000000113,1),(37,0000000113,1),(38,0000000113,1),(39,0000000120,1),(40,0000000120,1),(41,0000000120,1),(42,0000000127,1),(43,0000000127,1),(44,0000000127,1),(45,0000000134,1),(46,0000000134,1),(47,0000000134,1),(48,0000000141,1),(49,0000000141,1),(50,0000000141,1),(51,0000000148,1),(52,0000000148,1),(53,0000000148,1),(54,0000000155,1),(55,0000000155,1),(56,0000000155,1),(57,0000000162,1),(58,0000000162,1),(59,0000000162,1),(60,0000000169,1),(61,0000000169,1),(62,0000000169,1),(63,0000000176,1),(64,0000000176,1),(65,0000000176,1),(66,0000000183,1),(67,0000000183,1),(68,0000000183,1),(69,0000000190,1),(70,0000000190,1),(71,0000000190,1),(72,0000000197,1),(73,0000000197,1),(74,0000000197,1),(75,0000000204,1),(76,0000000204,1),(77,0000000204,1),(78,0000000211,1),(79,0000000211,1),(80,0000000211,1),(81,0000000218,1),(82,0000000218,1),(83,0000000218,1),(84,0000000225,1),(85,0000000225,1),(86,0000000225,1),(87,0000000232,1),(88,0000000232,1),(89,0000000232,1),(90,0000000239,1),(91,0000000239,1),(92,0000000239,1),(93,0000000246,1),(94,0000000246,1),(95,0000000246,1),(96,0000000253,1),(97,0000000253,1),(98,0000000253,1),(99,0000000260,1),(100,0000000260,1),(101,0000000260,1),(102,0000000267,1),(103,0000000267,1),(104,0000000267,1),(105,0000000274,1),(106,0000000274,1),(107,0000000274,1),(108,0000000281,1),(109,0000000281,1),(110,0000000281,1),(111,0000000288,1),(112,0000000288,1),(113,0000000288,1),(114,NULL,2),(115,NULL,3),(116,NULL,4),(117,NULL,5),(118,0000000001,1),(119,0000000001,1),(120,NULL,7),(121,NULL,6);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificationconfiguration`
--

DROP TABLE IF EXISTS `notificationconfiguration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationconfiguration` (
  `NotificationConfigurationID` int(11) NOT NULL AUTO_INCREMENT,
  `DaysBeforeOrAfter` int(10) DEFAULT NULL,
  `TimeToSend` time DEFAULT NULL,
  `Enabled` tinyint(1) DEFAULT NULL,
  `FacilityID` int(10) DEFAULT NULL,
  `NotificationTypeID` int(10) DEFAULT NULL,
  PRIMARY KEY (`NotificationConfigurationID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `notificationqueue`
--

DROP TABLE IF EXISTS `notificationqueue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationqueue` (
  `NotificationQueueID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
  PRIMARY KEY (`NotificationQueueID`)
) ENGINE=InnoDB AUTO_INCREMENT=457 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `notificationtype`
--

DROP TABLE IF EXISTS `notificationtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationtype` (
  `NotificationTypeID` int(11) NOT NULL,
  `TypeName` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`NotificationTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificationtype`
--

LOCK TABLES `notificationtype` WRITE;
/*!40000 ALTER TABLE `notificationtype` DISABLE KEYS */;
INSERT INTO `notificationtype` VALUES (1,'Recommendation'),(2,'Visit Reminder To Patient'),(3,'High Risk Visit Reminder To Doctor'),(4,'High Risk Pregnancies Summary To Oblast/Regio'),(5,'Patient Discharged From Hospital To Doctor'),(6,'Subscribe'),(7,'Unsubscribe');
/*!40000 ALTER TABLE `notificationtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'registry'
--
DELIMITER ;;
CREATE FUNCTION `HighRiskPregnancySummary`(nLoginID INT(10)) RETURNS varchar(2500) 
BEGIN

RETURN (
SELECT 
    group_concat(report.reportrow
        separator ', ')
FROM
    (SELECT 
        concat_ws(': ', f.facilityname, COUNT(*)) as reportrow
    FROM pregnancy p
			JOIN 
			(SELECT vi.FacilityID, vt.PregnancyID, vi.RiskGroup, vt.NextVisit FROM 
				(SELECT pregnancyID, MAX(NextVisit) as NextVisit 
				FROM visit 
				GROUP BY PregnancyID) vt 
		JOIN visit vi on vt.pregnancyid = vi.PregnancyID 
		WHERE vt.NextVisit = vi.NextVisit
		AND vi.RiskGroup=1
		GROUP BY NextVisit) v
	ON v.PregnancyID = p.pregnancyID
    JOIN facilities f ON f.FacilityID = v.FacilityID
	JOIN patient pat on pat.PatientID = p.PatientID
	LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
    WHERE
			v.RiskGroup =1
			AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), NOW()) > 0
			AND pat.Discharged = 0
			AND d.DeliveryID IS NULL
            AND f.FacilityID IN (SELECT f.FacilityID
            FROM ((districts
            INNER JOIN province ON districts.ProvinceID = province.ProvinceID)
            INNER JOIN facilities f ON f.DistrictID = districts.DistrictID)
            INNER JOIN countries c ON province.CountryID = c.CountryID
            WHERE
                province.ProvinceID = (SELECT 
                        province.ProvinceID
                    FROM
                        ((districts
                    INNER JOIN province ON districts.ProvinceID = province.ProvinceID)
                    INNER JOIN facilities f ON f.DistrictID = districts.DistrictID)
                    INNER JOIN countries c ON province.CountryID = c.CountryID
                    WHERE
                        f.facilityID = (SELECT 
                                loc.facilityID
                            FROM
                                login l
                            JOIN employees e ON e.LoginID = l.LoginID
                            JOIN location loc ON loc.LocationID = e.LocationID
                            WHERE
                                l.GroupID = 2 AND l.LoginID = nLoginID)))
    GROUP BY f.FacilityID) report);

END ;;

CREATE PROCEDURE `fillHighRiskPregnancySummaryNotificationForOblastUsers`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDayOfMonth INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultEmployeeLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueHRO` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   HighRiskPregnancySummary varchar(2500),
   doctorName varchar(250)
);

INSERT INTO tempQueueHRO
SELECT
					e.HandPhone as MobilePhone,
					(SELECT nt.text FROM notification n JOIN notificationtext nt on nt.NotificationID = n.NotificationID WHERE n.NotificationTypeID=4 AND nt.LanguageCode=nLanguageCode) as NotificationText,
					TIMESTAMP(nCurrentDate, IFNULL((SELECT nc.TimeToSend
												FROM notificationconfiguration nc
												WHERE nc.NotificationTypeID=4
												AND nc.FacilityID=loc.FacilityID), nDefaultTime)) as DateTimeToSend,
					TIMESTAMP(DATE_ADD(nCurrentDate, INTERVAL 7 DAY), IFNULL((SELECT nc.TimeToSend
												FROM notificationconfiguration nc
												WHERE nc.NotificationTypeID=4
												AND nc.FacilityID=loc.FacilityID), nDefaultTime)) as LatestBy,
					
					HighRiskPregnancySummary(l.LoginID) as HighRiskPregnancySummary,											
					CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName

					FROM login l
					JOIN employees e ON e.LoginID = l.LoginID
					JOIN location loc ON loc.LocationID = e.LocationID
					WHERE l.GroupID = 2
					AND IFNULL(e.HighRiskPregnanciesSummaryNotification, nDefaultEmployeeLevelON) = 1
					AND IFNULL((SELECT nc.Enabled FROM notificationconfiguration nc WHERE nc.NotificationTypeID=4 AND nc.FacilityID=loc.FacilityID), nDefaultON)=1
					AND IFNULL((SELECT nc.DaysBeforeOrAfter FROM notificationconfiguration nc WHERE nc.NotificationTypeID=4 AND nc.FacilityID=loc.FacilityID), nDayOfMonth) = DAYOFMONTH(nCurrentDate)
					AND HighRiskPregnancySummary(l.LoginID) IS NOT NULL;
	

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(	
		REPLACE(
			REPLACE(
				REPLACE(
					REPLACE(
						REPLACE(NotificationText, '[visitdate]', ''), 
					'[facilityname]', ''), 
				'[patientname]', ''),
			'[reportdate]', DATE_FORMAT(CURDATE(),'%d.%m.%Y')),
		'[report]', HighRiskPregnancySummary),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy
	FROM
	tempQueueHRO;

SELECT (SELECT Count(LatestBy) FROM tempQueueHRO) INTO nrOfNotifications;
DROP TABLE tempQueueHRO;

END ;;

CREATE PROCEDURE `fillHighRiskVisitReminderNotificationForDoctors`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysInAdvance INT(2), nDefaultTime varchar(8), nDefaultON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN


CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueD` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   visitDate varchar(10),
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueD
						SELECT
						e.HandPhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=3
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(v.NextVisit-IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance), IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(v.NextVisit, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,

						DATE_FORMAT(v.NextVisit,'%d.%m.%Y') as visitDate,
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

						FROM visit v
						JOIN pregnancy p on v.PregnancyID = p.PregnancyID
						JOIN patient pat on pat.PatientID = p.PatientID
						LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=3) nc on p.FacilityID = nc.FacilityID
						JOIN facilities f on f.FacilityID = v.FacilityID
						JOIN employees e on e.EmployeeID = v.EmployeeID
						LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
						WHERE IFNULL(nc.Enabled, nDefaultON)=1
						AND DATEDIFF(DATE_ADD(v.NextVisit, INTERVAL (-(IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance))) day), nCurrentDate)=0
						AND v.RiskGroup=1
						AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
						AND pat.Discharged = 0
						AND d.DeliveryID IS NULL
						AND TIMESTAMP(DATE_ADD(v.NextVisit, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) >= Date(NOW())
						ORDER BY DateTimeToSend ASC;


INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', visitDate), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy
	FROM
	tempQueueD;

SELECT (SELECT Count(LatestBy) FROM tempQueueD) INTO nrOfNotifications;
DROP TABLE tempQueueD;

END ;;

CREATE PROCEDURE `fillPatientDischargedFromHospitalisationNotificationToDoctors`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysAfter INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueD` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   dischargeDate varchar(10),
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueD
				   SELECT
						e.HandPhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=5
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(h.DischargeDate+IFNULL(nc.DaysBeforeOrAfter, nDaysAfter), IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(h.DischargeDate, INTERVAL 7 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,

						DATE_FORMAT(h.DischargeDate,'%d.%m.%Y') as dischargeDate,
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM pregnancy p
					JOIN hospitalisation h on p.PregnancyID = h.PregnancyID
					JOIN patient pat on pat.PatientID = p.PatientID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=5) nc on p.FacilityID = nc.FacilityID
					JOIN facilities f on f.FacilityID = h.FacilityID
					JOIN employees e on e.EmployeeID = p.EmployeeID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE IFNULL(nc.Enabled, nDefaultON)=1
					AND h.DischargeDate IS NOT NULL
					AND DATEDIFF(DATE_ADD(h.DischargeDate, INTERVAL((IFNULL(nc.DaysBeforeOrAfter, nDaysAfter))) day), nCurrentDate)=0
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[dischargedate]', dischargeDate), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy
	FROM
	tempQueueD;

SELECT (SELECT Count(LatestBy) FROM tempQueueD) INTO nrOfNotifications;
DROP TABLE tempQueueD;

END ;;

CREATE PROCEDURE `fillRecommendationNotificationForPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN
INSERT IGNORE INTO notificationqueue
					SELECT
						NULL as NotificationQueueID,
						pat.MobilePhone,
						nt.Text as NotificationText,
						TIMESTAMP(nCurrentDate, IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(nCurrentDate, INTERVAL 7 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy
					FROM (SELECT PatientID,
							FacilityID,
							PregnancyID,
							(280-DATEDIFF(Calc_DeliveryDate, nCurrentDate)) as dayofpregnancy
							FROM pregnancy
							WHERE DATEDIFF(DATE_ADD(Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) >= 0
							AND IFNULL(RecommendationNotifications, nDefaultPregnancyLevelON)=1) pr
					JOIN (SELECT NotificationID, notification.Day as dayToSend FROM notification WHERE NotificationTypeID=1) n on n.dayToSend = pr.dayOfPregnancy
					JOIN patient pat on pr.PatientID = pat.PatientID
					JOIN notificationtext nt on nt.NotificationID = n.NotificationID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=1) nc on pr.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON pr.PregnancyID = d.PregnancyID
					WHERE STRCMP(nt.LanguageCode, nLanguageCode) = 0
					AND IFNULL(nc.Enabled, nDefaultON)= 1
					AND pat.discharged = 0
					AND d.DeliveryID IS NULL
					ORDER BY DateTimeToSend ASC;

SELECT ROW_COUNT() INTO nrOfNotifications;

END ;;

CREATE PROCEDURE `fillSubscribeToPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysAfter INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultReminderPregnancyLevelON TINYINT(1), nDefaultRecommendationPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueSub` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueSub
					SELECT
						pat.MobilePhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=6
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(nCurrentDate, IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(nCurrentDate, INTERVAL 7 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
					
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM pregnancy p
					JOIN patient pat on pat.PatientID = p.PatientID
					JOIN facilities f on f.FacilityID = pat.FacilityID
					LEFT JOIN employees e on e.EmployeeID = p.EmployeeID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=6) nc on p.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE (IFNULL(nc.Enabled, nDefaultON)=1)
					AND ((IFNULL(p.ReminderNotifications, nDefaultReminderPregnancyLevelON)=1 OR (IFNULL(p.RecommendationNotifications, nDefaultRecommendationPregnancyLevelON)=1)))
					AND DATE(p.created) = DATE_SUB(nCurrentDate, INTERVAL IFNULL(nc.DaysBeforeOrAfter, nDaysAfter) day)
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL					
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', ''), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy
	FROM
	tempQueueSub;

SELECT (SELECT Count(LatestBy) FROM tempQueueSub) INTO nrOfNotifications;
DROP TABLE tempQueueSub;
					
END ;;

CREATE PROCEDURE `fillUnsubscribeToPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysAfter INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultReminderPregnancyLevelON TINYINT(1), nDefaultRecommendationPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueUnsub` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueUnsub
					SELECT
						pat.MobilePhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=7
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(nCurrentDate, IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(nCurrentDate, INTERVAL 7 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
					
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM pregnancy p
					JOIN patient pat on pat.PatientID = p.PatientID
					JOIN facilities f on f.FacilityID = pat.FacilityID
					LEFT JOIN employees e on e.EmployeeID = p.EmployeeID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=7) nc on p.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE (IFNULL(nc.Enabled, nDefaultON)=1)
					AND IFNULL(p.ReminderNotifications, nDefaultReminderPregnancyLevelON)=0 
					AND IFNULL(p.RecommendationNotifications, nDefaultRecommendationPregnancyLevelON)=0
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL
					AND DATE(p.created) = DATE_SUB(nCurrentDate, INTERVAL IFNULL(nc.DaysBeforeOrAfter, nDaysAfter) day)
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', ''), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy
	FROM
	tempQueueUnsub;

SELECT (SELECT Count(LatestBy) FROM tempQueueUnsub) INTO nrOfNotifications;
DROP TABLE tempQueueUnsub;
					
END ;;

CREATE PROCEDURE `fillVisitReminderHospitalisationNotificationForPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysInAdvance INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueVRH` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   visitDate varchar(10),
   facilityName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueVRH
					SELECT
						pat.MobilePhone as MobilePhone,
						(SELECT nt.text FROM notification n
							JOIN notificationtext nt on nt.NotificationID = n.NotificationID
							WHERE n.NotificationTypeID=2
							AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(h.RecomObstetricExaminationDate-IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance), IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(h.RecomObstetricExaminationDate, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
					
						DATE_FORMAT(h.RecomObstetricExaminationDate,'%d.%m.%Y') as visitDate,
						hf.FacilityName as facilityName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM pregnancy p					
					JOIN patient pat on pat.PatientID = p.PatientID
					JOIN hospitalisation h on h.PregnancyID = p.PregnancyID
					JOIN facilities hf on h.facilityID = hf.FacilityID					
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=2) nc on p.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE IFNULL(nc.Enabled, nDefaultON)=1
					AND h.RecomObstetricExamination = 1
					AND IFNULL(p.ReminderNotifications, nDefaultPregnancyLevelON)=1
					AND DATEDIFF(DATE_ADD(h.RecomObstetricExaminationDate, INTERVAL (-(IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance))) day), nCurrentDate)=0
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL
					AND TIMESTAMP(DATE_ADD(h.RecomObstetricExaminationDate, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) >= Date(NOW())
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', visitDate), 
			'[facilityname]', facilityName), 
		'[doctorname]', ''),
	'[patientname]', patientName) as NotificationText, 
	DateTimeToSend, 
	LatestBy
	FROM
	tempQueueVRH;

SELECT (SELECT Count(LatestBy) FROM tempQueueVRH) INTO nrOfNotifications;
DROP TABLE tempQueueVRH;

END ;;

CREATE PROCEDURE `fillVisitReminderNotificationForPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysInAdvance INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueP` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   visitDate varchar(10),
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueP
					SELECT
						pat.MobilePhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=2
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(v.NextVisit-IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance), IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(v.NextVisit, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
						
						DATE_FORMAT(v.NextVisit,'%d.%m.%Y') as visitDate,
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM visit v
					JOIN pregnancy p on v.PregnancyID = p.PregnancyID
					JOIN patient pat on pat.PatientID = p.PatientID
					JOIN facilities f on f.FacilityID = p.FacilityID
					LEFT JOIN employees e on e.EmployeeID = v.EmployeeID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=2) nc on p.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE IFNULL(nc.Enabled, nDefaultON)=1
					AND IFNULL(p.ReminderNotifications, nDefaultPregnancyLevelON)=1
					AND DATEDIFF(DATE_ADD(v.NextVisit, INTERVAL (-(IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance))) day), nCurrentDate)=0
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL
					AND TIMESTAMP(DATE_ADD(v.NextVisit, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) >= Date(NOW())
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', visitDate), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy
	FROM
	tempQueueP;

SELECT (SELECT Count(LatestBy) FROM tempQueueP) INTO nrOfNotifications;
DROP TABLE tempQueueP;

END ;;

CREATE PROCEDURE `insertnotification`(IN nText varchar(2500), nDay INT(10), nType INT(10), nLanguageCode varchar(2))
BEGIN
INSERT INTO notification
(Day,
NotificationTypeID)
VALUES
(nDay,
nType);
INSERT INTO notificationtext
(NotificationID,
Text,
LanguageCode)
VALUES
(LAST_INSERT_ID(),
nText,
nLanguageCode);
END ;;
DELIMITER ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;