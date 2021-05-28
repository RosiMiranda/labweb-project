var name = 'Verde'
var address = 'Mi casa'
var email = 'verde@email.com';
var password = '12345'

describe('register-login-logout', () => {
    it('Register', () => {
        cy.on('uncaught:exception', () => false);
  
        cy.visit('http://labweb-project.test/home');
    
        cy.contains('Iniciar sesión').click({ force: true });
    
        cy.url().should('include', '/login');
  
        cy.contains('Registrate').click({ force: true });
  
        cy.url().should('include', '/register');
  
        cy.get('[name="name"]')
            .type(name);
  
        cy.get('[name="email"]')
            .type(email);
  
        cy.get('[name="address"]')
            .type(address);
  
        cy.get('[name="password"]')
            .type(password);
  
        cy.get('[name="password_confirmation"]')
            .type(password);
  
        cy.get('#register-button').click();
    })

    it('Logins', () => {

      cy.contains('Iniciar sesión').click({ force: true });

      cy.url().should('include', '/login');

      cy.get('[name="email"]')
          .type(email);
      cy.get('[name="password"]')
          .type(password);
      cy.get('#login-button').click();

      cy.url().should('include', '/home');

      cy.contains(name);

    })

    it('Logouts', () => {

        cy.contains(name).click({ force: true });

        cy.contains('Cerrar sesión').click({ force: true });
  
        cy.url().should('include', '/login');

    })
    
  })