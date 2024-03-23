export const validationMethods = {
  validateRequiredFields: function (data: any, requiredFields: string[]): boolean {
    return requiredFields.every((field) => !!data[field])
  },
  validateFieldsWithRegex: function (value: string | undefined, regex: RegExp): boolean {
    if (value && !regex.test(value)) {
      return false
    } else {
      return true
    }
  }
}

export const MAIL_REGEX = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/
export const PASSWORD_REGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/

export const MAIL_ERROR_MESSAGE = 'Invalid email address'
export const PASSWORD_ERROR_MESSAGE =
  'At least one uppercase letter, one lowercase letter, one number and eight characters'
