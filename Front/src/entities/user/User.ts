import type { UserDto } from './UserDto'

export class User {
  id: number
  email: string
  roles: string[]
  password: string

  constructor(userDto: UserDto) {
    ;(this.id = userDto.id),
      (this.email = userDto.email),
      (this.roles = userDto.roles),
      (this.password = userDto.password)
  }
}
