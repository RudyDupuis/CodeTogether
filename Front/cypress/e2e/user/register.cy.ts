// describe('As a user, i can register', () => {
//   beforeEach(() => {
//     cy.intercept('GET', 'https://localhost:5001/api/specialities').as('specialities')
//     cy.visit('/register')
//     cy.contains('h1', 'Register')
//     cy.wait('@specialities')
//   })

//   it('can register', () => {
//     cy.intercept('POST', 'https://localhost:5001/api/register').as('register')
//     cy.intercept('POST', 'https://localhost:5001/api/auth').as('auth')
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-email').type('john.doe@test.com')
//     cy.getBySel('ct-db-select').select('Front-end developer')
//     cy.getBySel('ct-second-select-0').select('Beginner')
//     cy.getBySel('register-user-password').type('123456azertAA')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('register-form-button').click()
//     cy.wait('@register')
//     cy.wait('@auth')
//     cy.url().should('include', '/')
//   })
// })

// describe('As a user, i cannot register without', () => {
//   beforeEach(() => {
//     cy.intercept('GET', 'https://localhost:5001/api/specialities').as('specialities')
//     cy.visit('/register')
//     cy.contains('h1', 'Register')
//     cy.wait('@specialities')
//   })

//   it('cannot register without pseudo', () => {
//     cy.getBySel('register-user-email').type('john.doe@test.com')
//     cy.getBySel('ct-db-select').select('Front-end developer')
//     cy.getBySel('ct-second-select-0').select('Beginner')
//     cy.getBySel('register-user-password').type('123456azertAA')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('form-required-fields-error-message').should('be.visible')
//   })
//   it('cannot register without email', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('ct-db-select').select('Front-end developer')
//     cy.getBySel('ct-second-select-0').select('Beginner')
//     cy.getBySel('register-user-password').type('123456azertAA')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('form-required-fields-error-message').should('be.visible')
//   })
//   it('cannot register without specialities', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-email').type('john.doe@test.com')
//     cy.getBySel('register-user-password').type('123456azertAA')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('form-required-fields-error-message').should('be.visible')
//   })
//   it('cannot register without password', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-email').type('john.doe@test.com')
//     cy.getBySel('ct-db-select').select('Front-end developer')
//     cy.getBySel('ct-second-select-0').select('Beginner')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('form-required-fields-error-message').should('be.visible')
//   })
// })

// describe('As a user, i cannot register with bad', () => {
//   beforeEach(() => {
//     cy.intercept('GET', 'https://localhost:5001/api/specialities').as('specialities')
//     cy.visit('/register')
//     cy.contains('h1', 'Register')
//     cy.wait('@specialities')
//   })

//   it('cannot register with a bad email', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-email').type('badmail')
//     cy.getBySel('ct-db-select').select('Front-end developer')
//     cy.getBySel('ct-second-select-0').select('Beginner')
//     cy.getBySel('register-user-password').type('123456azertAA')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('register-user-email-error').contains('Invalid email address')
//   })
//   it('cannot register with a bad password', () => {
//     cy.getBySel('register-user-pseudo').type('John.Doe')
//     cy.getBySel('register-user-email').type('john.doe@test.com')
//     cy.getBySel('ct-db-select').select('Front-end developer')
//     cy.getBySel('ct-second-select-0').select('Beginner')
//     cy.getBySel('register-user-password').type('rr')
//     cy.getBySel('register-form-button').click()
//     cy.getBySel('register-user-password-error').contains(
//       'At least one uppercase letter, one lowercase letter, one number and eight characters'
//     )
//   })
// //   it('cannot register with same mail', () => {
// //     cy.intercept('POST', 'https://localhost:5001/api/register').as('register')
// //     cy.getBySel('register-user-pseudo').type('John.Doe')
// //     cy.getBySel('register-user-email').type('john.doe@test.com')
// //     cy.getBySel('ct-db-select').select('Front-end developer')
// //     cy.getBySel('ct-second-select-0').select('Beginner')
// //     cy.getBySel('register-user-password').type('123456azertAA')
// //     cy.getBySel('register-form-button').click()
// //     cy.getBySel('register-form-button').click()
// //     cy.wait('@register')
// //     cy.getBySel('form-error-message').contains('This email is already in use.')
// //   })
// })
