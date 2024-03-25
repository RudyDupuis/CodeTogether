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
  })
  it('cannot login without email', () => {
    cy.getBySel('login-user-password').type('123456azertAA')
    cy.getBySel('login-form-button').click()
    cy.getBySel('form-required-fields-error-message').should('be.visible')
  })
  it('cannot login without password', () => {
    cy.getBySel('login-user-email').type('john.doe@test.com')
    cy.getBySel('login-form-button').click()
    cy.getBySel('form-required-fields-error-message').should('be.visible')
  })
})