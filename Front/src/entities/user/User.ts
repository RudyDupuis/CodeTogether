import type { UserDto } from './UserDto'

export class User {
  id: number
  email: string
  roles: string[]

  constructor(userDto: UserDto) {
    ;(this.id = userDto.id), (this.email = userDto.email), (this.roles = userDto.roles)
  }
}
