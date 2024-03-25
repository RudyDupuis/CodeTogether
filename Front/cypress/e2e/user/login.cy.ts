describe('As a user, i can login', () => {
  beforeEach(() => {
    cy.visit('/login')
    cy.contains('h1', 'Login')
  })
  it('can login', () => {
    cy.getBySel('login-user-email').type('john.doe@test.com')
    cy.getBySel('login-user-password').type('123456azertAA')
    
    cy.getBySel('login-form-button').click()
    cy.getBySel('login-form-button').click()

    cy.getBySel('dot-loader').should('be.visible')
    
    cy.intercept('POST', 'https://localhost:5001/api/auth').as('loginRequest');
    cy.wait('@loginRequest').then((interception) => {
      expect(interception.request.body).to.include({
        email: 'john.doe@test.com',
        password: '123456azertAA'
      });
    });
  })
})