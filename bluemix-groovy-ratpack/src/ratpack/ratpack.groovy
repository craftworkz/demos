import static ratpack.groovy.Groovy.ratpack
import ratpack.jackson.guice.JacksonModule
import static ratpack.jackson.Jackson.json

ratpack {
	bindings {
		module JacksonModule
	}
    handlers {
        get {
            render 'Hello Bluemix!'
        }
        get('person') {
            render json(new Person(id: 1, name: 'John Doe', age: 31))
        }
    }
}

class Person {
   Long id
   String name
   int age
}
