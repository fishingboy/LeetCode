# Write your MySQL query statement below
SELECT IFNULL(Salary, NULL) AS SecondHighestSalary FROM (SELECT DISTINCT Salary FROM Employee ORDER BY Salary DESC LIMIT 1,1) AS sal