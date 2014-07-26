CALL `registry`.`fillRecommendationNotificationForPatients`(current_date, 'UK', '10:00:00', 1, 1, @nrOfNotifications);

CALL `registry`.`fillVisitReminderNotificationForPatients`(current_date, 'UK', 1, '10:00:00', 1, 1, @nrOfNotifications);

CALL `registry`.`fillVisitReminderHospitalisationNotificationForPatients`(current_date, 'UK', 1, '10:00:00', 1, 1, @nrOfNotifications);




