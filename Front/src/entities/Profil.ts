import type { Speciality } from './Speciality'
import type { Technology } from './Technology'
import type { User } from './User'

export class Profil {
  constructor(
    public id: number,
    public pseudo: string,
    public specialityList: Array<SpecialityLevel> | Array<Partial<SpecialityLevel>>,
    public userRelation: User,
    public linkedinLink?: string,
    public portfolioLink?: string,
    public repositoryLink?: string,
    public description?: string,
    public profilPicture?: string,
    public availability?: string,
    public technologyList?: Array<TechnologyLevel>
  ) {}
}

export class SpecialityLevel {
  constructor(
    public id: number,
    public speciality: Speciality | string,
    public level: 'Beginner' | 'Intermediate' | 'Advanced',
    public profil: Profil
  ) {}
}

export class TechnologyLevel {
  constructor(
    public id: number,
    public technology: Technology,
    public level: 'Beginner' | 'Intermediate' | 'Advanced',
    public profil: Profil
  ) {}
}
