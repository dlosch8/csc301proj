SELECT makename, modelname, partname FROM car_make
JOIN car_model on car_model.makeid = car_make.makeid
JOIN car_parts on car_parts.modelid = car_model.modelid
WHERE car_parts.partname LIKE :term