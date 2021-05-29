//Cambia variables a valores de entidades exitentes antes de correr la prueba
var email = 'rosa@email.com';
var userName = 'Rosa';
var password = '12345';
var productDescription = 'Vestido usado';
var precio = '400';

describe('product-to-order', () => {

    it('OrderWithOneProduct', () => {
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

        cy.contains('Comprar').click({ force: true });

        cy.url().should('include', '/store');

        cy.contains(productDescription).click({ force: true });

        cy.url().should('include', '/products/');

        cy.contains('Agregar al carrito').click({ force: true });

        cy.url().should('include', '/mycart');

        cy.contains('Ver').click({ force: true });

        cy.url().should('include', '/order/');

        cy.contains(userName);
        cy.contains(productDescription);
        cy.contains(precio);

        cy.contains('Tienda').click({ force: true });

        cy.url().should('include', '/store');

        cy.get(productDescription).should('not.exist');
        
    })

})