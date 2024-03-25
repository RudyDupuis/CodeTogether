describe('As a user, i can register', () => {
  beforeEach(() => {
    cy.visit('/register')
    cy.contains('h1', 'Register')
  })
  it('can register', () => {
    cy.getBySel('register-user-email').type('john.doe@test.com')
    cy.getBySel('register-user-password').type('123456azertAA')
    
    cy.getBySel('register-form-button').click()
    cy.getBySel('register-form-button').click()

    cy.getBySel('dot-loader').should('be.visible')
    
    cy.intercept('POST', 'https://localhost:5001/api/register').as('registerRequest');
    cy.wait('@registerRequest').then((interception) => {
      expect(interception.request.body).to.include({
        email: 'john.doe@test.com',
        password: '123456azertAA'
      });
    });
  })
  it('cannot register with a bad email', () => {
    cy.getBySel('register-user-email').type('badmail')
    cy.getBySel('register-user-password').type('123456azertAA')
    cy.getBySel('register-form-button').click()
    cy.getBySel('register-user-email-error').contains('Invalid email address')
  })
  it('cannot register with a bad password', () => {
    cy.getBySel('register-user-email').type('john.doe@test.com')
    cy.getBySel('register-user-password').type('rr')
    cy.getBySel('register-form-button').click()
    cy.getBySel('register-user-password-error').contains('At least one uppercase letter, one lowercase letter, one number and eight characters')
  })
})