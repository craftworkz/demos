package be.craftworkz.demo;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/items")
public class ItemController {
	
	@Autowired
	private ItemsRepository itemsRepository;
	
	@RequestMapping
	public List<Item> list() {
		return itemsRepository.findAll();
	}
	
	@RequestMapping(method=RequestMethod.POST)
	public Item add(@RequestBody final Item item) {
		return itemsRepository.save(item);
	}
	
}
