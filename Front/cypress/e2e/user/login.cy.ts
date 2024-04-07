describe('As a user, i can login', () => {
  beforeEach(() => {
    cy.visit('/login')
    cy.contains('h1', 'Login')
  })

  it('can login', () => {
    cy.intercept('POST', 'https://localhost:5001/api/auth').as('auth')
    cy.getBySel('login-user-email').type('john.doe@example.com')
    cy.getBySel('login-user-password').type('password')

    cy.getBySel('login-form-button').click()
    cy.getBySel('login-form-button').click()

    cy.wait('@auth')
    cy.url().should('include', '/')
  })
})

describe('As a user, i cannot login without', () => {
  beforeEach(() => {
    cy.visit('/login')
    cy.contains('h1', 'Login')
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

describe('As a user, i cannot login with bad', () => {
  beforeEach(() => {
    cy.visit('/login')
    cy.contains('h1', 'Login')
  })
  it('cannot login with bad informations', () => {
    cy.intercept('POST', 'https://localhost:5001/api/auth').as('auth')
    cy.getBySel('login-user-email').type('bad@mail.com')
    cy.getBySel('login-user-password').type('password')

    cy.getBySel('login-form-button').click()
    cy.getBySel('login-form-button').click()

    cy.wait('@auth')
    cy.getBySel('form-error-message').contains('Invalid credentials.')
  })
})
