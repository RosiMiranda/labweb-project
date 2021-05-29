//Cambia variables a valores de entidades exitentes antes de correr la prueba
var email = 'rosa@email.com';
var userName = 'Rosa';
var password = '12345';
var productDescription = 'Vestido usado solamente una vez';
var precio = '100';
var orderId = '2';

describe('verify-active-order', () => {

    it('VerifyActiveOrder', () => {

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

      cy.contains(userName).click({ force: true });

      cy.contains('Ordenes Activas').click({ force: true });

      cy.url().should('include', '/order');

      cy.contains(orderId);

      cy.contains('Ver').click({ force: true });

      cy.url().should('include', '/order/'+orderId);


      cy.contains(userName);
      cy.contains(productDescription);
      cy.contains(precio);

    })
})