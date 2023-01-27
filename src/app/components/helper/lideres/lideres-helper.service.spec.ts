import { TestBed } from '@angular/core/testing';

import { LideresHelperService } from './lideres-helper.service';

describe('VolunteerHelperService', () => {
    let service: LideresHelperService;

    beforeEach(() => {
        TestBed.configureTestingModule({});
        service = TestBed.inject(LideresHelperService);
    });

    it('should be created', () => {
        expect(service).toBeTruthy();
    });
});
