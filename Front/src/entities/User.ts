import type { Profile } from './Profile'

export class User {
  constructor(
    public id: number,
    public email: string,
    public roles: string[],
    public profile: Profile | Partial<Profile>,
    public password?: string
  ) {}
}
