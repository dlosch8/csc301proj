SELECT userid
FROM car_users
WHERE username = :username AND
      password = :password