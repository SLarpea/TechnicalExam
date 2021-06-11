#Part II Mysql

1. Select ProductName, Quantity/PerUnit FROM products
2. Select ProductID, ProductName FROM products
3. Select ProductName, UnitPrice From products Order by UnitPrice DESC
4. Select ProductName, UnitPrice From product Where UnitPrice > AVG(UnitPrice)
5. Select ProductID, Name, UnitPrice From products Where UnitPrice < 20
6. Select ProductName, UnitsOnOrder, UnitsInStock From products Where UnitsInStock < UnitsOnOrder 