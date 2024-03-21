import type { AuthDto } from './AuthDto'

export class Auth {
  email: string
  password: string

  constructor(authDto: AuthDto) {
    ;(this.email = authDto.email), (this.password = authDto.password)
  }
}
