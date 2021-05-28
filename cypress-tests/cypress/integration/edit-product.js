//Cambia variables a valores de entidades exitentes antes de correr la prueba
var email = 'verde@email.com';
var userName = 'Verde';
var password = '12345';
var productId= '1'
var oldDescription = 'Azules, de mezclilla';
var oldPrecio = '200';
var oldTalla = 'M';
var newDescription = 'Azules, de mezclilla clara';
var newPrecio = '500';
var newTalla = 'L';

describe('product-edition', () => {

    it('EditsProduct', () => {

        cy.on('uncaught:exception', () => false);
  
        cy.visit('http://labweb-project.test/home');

        cy.contains('Iniciar sesión').click({ force: true });

        cy.url().should('include', '/login');
  
        cy.get('[name="email"]')
            .type(email);
        cy.get('[name="password"]')
            .type(password);
        cy.get('#login-button').click();
  
        cy.url().should('include', '/home');
  
        cy.contains(userName);

        cy.contains('Vender').click({ force: true });

        cy.url().should('include', '/splendid');

        cy.contains(oldDescription).click({ force: true });

        cy.url().should('include', '/my_products/'+productId);

        cy.contains(oldDescription);
        cy.contains(oldPrecio);
        cy.contains(oldTalla);

        cy.get('#edit-product').click();
        
        cy.url().should('include', '/editProduct/'+productId);

        cy.get('[name="description"]').clear();

        cy.get('[name="description"]')
            .type(newDescription);
        
        cy.get('[name="price"]').clear();

        cy.get('[name="price"]')
            .type(newPrecio);

        cy.get('[name="size"]').clear();
            
        cy.get('[name="size"]')
            .type(newTalla);

        cy.get('[value="Editar"]').click();

        cy.url().should('include', '/splendid');

        cy.contains(newDescription).click({ force: true });

        cy.url().should('include', '/my_products/'+productId);

        cy.contains(newDescription);
        cy.contains(newPrecio);
        cy.contains(newTalla);
    
    })

})