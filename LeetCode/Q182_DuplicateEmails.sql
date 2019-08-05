# Write your MySQL query statement below
SELECT Email FROM (
    SELECT COUNT(*) AS cnt, Email FROM Person GROUP BY Email HAVING cnt > 1
) AS results