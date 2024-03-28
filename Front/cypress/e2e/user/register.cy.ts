// describe('As a user, i can register', () => {
//   beforeEach(() => {
//     cy.visit('/register')
//     cy.contains('h1', 'Register')
//   })
//   it('cannot register with a bad email', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-email').type('badmail')
//     cy.getBySel('register-user-password').type('123456azertAA')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('register-user-email-error').contains('Invalid email address')
//   })
//   it('cannot register with a bad password', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-email').type('john.doe@test.com')
//     cy.getBySel('register-user-password').type('rr')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('register-user-password-error').contains('At least one uppercase letter, one lowercase letter, one number and eight characters')
//   })
//   it('cannot register without pseudo', () => {
//     cy.getBySel('register-user-email').type('john.doe@test.com')
//     cy.getBySel('register-user-password').type('123456azertAA')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('form-required-fields-error-message').should('be.visible')
//   })
//   it('cannot register without email', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-password').type('123456azertAA')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('form-required-fields-error-message').should('be.visible')
//   })
//   it('cannot register without password', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-email').type('john.doe@test.com')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('form-required-fields-error-message').should('be.visible')
//   })
// })