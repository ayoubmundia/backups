package org.sid;

import org.sid.metier.ICinemaInitService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class SpringCinemaApplication implements CommandLineRunner{
	
	@Autowired
	private ICinemaInitService cinemaService;

	public static void main(String[] args) {
		SpringApplication.run(SpringCinemaApplication.class, args);
	}

	@Override
	public void run(String... args) throws Exception {
		System.out.println("Welcome to Spring cinema Application");
		cinemaService.initVilles();
		cinemaService.initCinemas();
		cinemaService.initSalles();
		cinemaService.initPlaces();
		cinemaService.initSeances();
		cinemaService.initCategories();
		cinemaService.initFilms();
		cinemaService.initProjections();
		cinemaService.initTickets();
	}

}
