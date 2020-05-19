-- MySQL
-- Lottery (int id, string name, string slug)
-- LotteryTicket (int id, int lottery_id, Carbon|DateTime created_at)

SELECT lt.id FROM lottery_tickets lt
INNER JOIN lotteries l
ON lt.lottery_id = l.id
WHERE l.slug = 'lottery-slug'
AND lt.created_at >= '2020-03-20';
