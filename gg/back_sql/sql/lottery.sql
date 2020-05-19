-- MySQL
-- lotteries (int id, string slug, string timezone)

SELECT COUNT(id) FROM lotteries
WHERE timezone = 'Europe/Warsaw';
