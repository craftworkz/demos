package be.craftworkz.demo;

import org.springframework.data.mongodb.repository.MongoRepository;

public interface ItemsRepository extends MongoRepository<Item, Long> { 

}
